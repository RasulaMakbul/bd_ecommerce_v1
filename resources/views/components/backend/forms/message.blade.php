@if(session('message'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="text-success">{{ session('message') }}</span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif