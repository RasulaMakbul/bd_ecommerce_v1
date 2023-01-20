<x-backend.master>
    <x-slot:title>
        {{__('Makeup Products')}}
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Makeup Products')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                <a href="{{ route('makeupProduct.trash') }}">
                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i> Trash</button>
                </a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeupProduct.create')}}">
                <i class="fa-solid fa-plus"></i> {{__('Create')}}
            </a>
        </div>
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Title')}}</th>
                <th scope="col">{{__('Code')}}</th>
                <th scope="col">{{__('Product Name')}}</th>
                <th scope="col">{{__('Costing')}}</th>
                <th scope="col">{{__('Unit Price')}}</th>
                <th scope="col">{{__('Stock')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makeupColorP as $color)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $color->title }}</td>
                <td>{{ $color->code }}</td>

                <td>
                    {{$color->makeupProducts?->title}}
                </td>
                <td>{{ $color->costing }}</td>
                <td>{{ $color->unitProce }}</td>
                <td>{{ $color->stock }}</td>

                <td>
                    <a href="{{route('makeupColor.show',$color->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="{{route('makeupColor.edit',$color->id)}}" class="btn btn-sm link-warning"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
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
                                    <form action="{{ route('makeupColor.destroy', $color->id) }}" method="post" style="display:inline">
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