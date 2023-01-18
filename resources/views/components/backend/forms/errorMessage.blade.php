@if(session('message'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <span class="text-danger">{{ session('message') }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif