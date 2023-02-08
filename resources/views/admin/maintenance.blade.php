<x-layout>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-striped text-center my-5">
                <thead>
                    <tr>
                        <th>@lang('maintenance.account')</th>
                        <th>@lang('maintenance.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->first_name }} - {{ $user->role->name }}</td>
                            <td>
                                <a href="/account-maintenance/{{$user->id}}/edit" class="btn btn-info text-white btn-sm">@lang('maintenance.update')</a>
                                <form method="POST" action="/account-maintenance/{{$user->id}}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">@lang('maintenance.delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
