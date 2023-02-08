<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        $genders = Gender::all();
        $roles = Role::all();
        return view('users.register', [
            'genders' => $genders,
            'roles' => $roles
        ]);
    }

    // Create New User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
            'gender_id' => 'required|exists:genders,id',
            'picture' => 'required|image',
            'password' => 'required|alpha_num|min:8|confirmed',
        ]);

        $formFields['picture'] = $request->file('picture')->store('pictures', 'public');

        $formFields['picture'] = 'storage/' . $formFields['picture'];
        // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/home')->with('message', 'successfully_created_account');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'alpha_num']
        ]);

        $user = User::where('email', $formFields['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Wrong Email/Password. Please Check Again'])->withInput(request()->only('email'));
        }

        if ($user->password != $formFields['password']) {
            return back()->withErrors(['email' => 'Wrong Email/Password. Please Check Again'])->withInput(request()->only('email'));
        }

        // Log in the user
        Auth::login($user);

        return redirect('/home')->with('message', 'success_login');
    }


    // Logout User
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/logout');
    }

    public function showLogoutPage()
    {
        return view('users.logout');
    }

    public function edit(User $user)
    {
        if ($user->id != auth()->user()->id) return redirect('/home')->with('error', 'unauthorized');
        $roles = Role::all();
        $genders = Gender::all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'genders' => $genders
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($user->id != auth()->user()->id) return redirect('/home')->with('error', 'unauthorized');
        $formFields = $request->validate([
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
            'gender_id' => 'required|exists:genders,id',
            'picture' => 'image',
            'password' => 'required|alpha_num|min:8|confirmed',
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
            $formFields['picture'] = 'storage/' . $formFields['picture'];
        } else {
            $formFields['picture'] = $user->picture;
        }

        $user->update($formFields);

        return redirect('/users/' . $user->id . '/saved');
    }

    public function saved(User $user)
    {
        return view('users.saved');
    }

    public function accountMaintenance()
    {
        $users = User::with('role')->get();
        return view('admin.maintenance', [
            'users' => $users
        ]);
    }

    public function showEditRoleForm(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function updateRole(Request $request, User $user)
    {
        $formFields = $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);
        $user->role_id = $formFields['role_id'];
        $user->save();
        return redirect('/account-maintenance')->with('message', 'successfully_update_role');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect('/account-maintenance')->with('message', 'successfully_delete_user');
    }
}
