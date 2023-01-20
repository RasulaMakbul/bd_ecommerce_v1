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
                <th scope="col">{{__('Product Name')}}</th>
                <th scope="col">{{__('Category Name')}}</th>
                <th scope="col">{{__('Subcategory Name')}}</th>
                <th scope="col-4" class="col-2 text-truncate">{{__('Short Defination')}}</th>
                <th scope="col">{{__('Weight')}}</th>
                <th scope="col">{{__('Origin')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->title }}</td>
                <td>
                    @if(isset($product->makeup_id))
                    {{$product->makeup?->title}}
                    @else
                    <span class="bg-danger">{{__('Product Under Subcategory')}}</span>
                    @endif
                </td>
                <td>
                    @if(isset($product->makeup_sub_category_id))
                    {{$product->makeupSubCategory?->title}}
                    @else
                    <span class="bg-danger">{{__('Product Under Category')}}</span>
                    @endif
                </td>


                <td>{{ $product->shortDefination }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->origin }}</td>
                <td>@if($product->is_active==1)

                    <a href="{{route('makeupProduct.inactive',$product->id)}}" class="btn btn-sm link-danger">Active</a>
                    @else

                    <a href="{{route('makeupProduct.active',$product->id)}}" class="btn btn-sm link-success">Inactive</a>
                    @endif
                </td>

                <td>
                    <a href="{{route('makeupProduct.show',$product->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="{{route('makeupProduct.edit',$product->id)}}" class="btn btn-sm link-warning"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
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
                                    <form action="{{ route('makeupProduct.destroy', $product->id) }}" method="post" style="display:inline">
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