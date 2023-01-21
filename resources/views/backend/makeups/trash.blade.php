<x-backend.master>
    <x-slot:title>
        {{__('Makeups')}}
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Makeups')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                <a href="{{ route('makeup.trash') }}">
                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i> Trash</button>
                </a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeup.index')}}">
                <i class="fa-solid fa-book"></i> {{__('Makeup Categories')}}
            </a>
        </div>
    </div>

    <h2>{{__('Makeup Categories')}}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makeups as $makeup)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $makeup->title }}</td>
                <td>@if($makeup->is_active==1)

                    <a href="{{route('makeup.inactive',$makeup->id)}}" class="btn btn-sm link-danger">Active</a>
                    @else

                    <a href="{{route('makeup.active',$makeup->id)}}" class="btn btn-sm link-success">Inactive</a>
                    @endif
                </td>
                <td>
                    <a href="{{route('makeup.restore',$makeup)}}" class="btn btn-sm link-warning"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn link-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fa-solid fa-trash fs-5"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLebel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLebel">Warning!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('makeup.delete', $makeup->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger">Confirm</i></button>
                                    </form>
                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-backend.master>