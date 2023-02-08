@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
    {{__('error.' . session('error'))}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif