<x-backend.master>
    <x-slot:title>
        {{__('Makeup Subcategory')}}
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Makeup Subcategory')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                <a href="{{ route('makeupSubCategory.trash') }}">
                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i> Trash</button>
                </a>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeupSubCategory.create')}}">
                <i class="fa-solid fa-plus"></i> {{__('Create')}}
            </a>
        </div>
    </div>

    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Image')}}</th>
                <th scope="col">{{__('Subcategory Name')}}</th>
                <th scope="col">{{__('Category Name')}}</th>
                <th scope="col-4" class="col-2 text-truncate">{{__('Description')}}</th>
                <th scope="col">{{__('Products')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makeupSubCategories as $makeupSubCategory)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td class="tableImage"><img src="{{asset('storage/makeupSubCategory/'.$makeupSubCategory->image)}}" alt=""></td>
                <td>{{ $makeupSubCategory->title }}</td>
                <td>
                    {{ $makeupSubCategory->makeup->title }}

                </td>
                <td>{{ $makeupSubCategory->description }}</td>
                <td>6</td>
                <td>@if($makeupSubCategory->is_active==1)

                    <a href="{{route('makeupSubCategory.inactive',$makeupSubCategory->id)}}" class="btn btn-sm link-danger">Active</a>
                    @else

                    <a href="{{route('makeupSubCategory.active',$makeupSubCategory->id)}}" class="btn btn-sm link-success">Inactive</a>
                    @endif
                </td>
                <td>
                    <a href="{{route('makeupSubCategory.show',$makeupSubCategory->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
                    <a href="{{route('makeupSubCategory.edit',$makeupSubCategory->id)}}" class="btn btn-sm link-warning"><i class="fa-solid fa-pen-to-square fs-5"></i></a>
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
                                    <form action="{{ route('makeupSubCategory.destroy', $makeupSubCategory->id) }}" method="post" style="display:inline">
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
            @if($makeupSubCategory->makeup->deleted_at === NULL)
            @endif
            @endforeach
        </tbody>
    </table>
</x-backend.master>