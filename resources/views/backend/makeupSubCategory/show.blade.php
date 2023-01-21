<x-backend.master>
    <x-slot:title>
        {{$makeupSubCategory->title}}
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$makeupSubCategory->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#productCreateModal">
                <i class="fa-solid fa-plus"></i> {{__('Create Product')}}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="productCreateModal" tabindex="-1" aria-labelledby="productCreateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productCreateModalLabel">{{__('Create Product')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('makeupProduct.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Product Name')}}" type="text" id="title" :value="old('title')" />
                                <x-backend.forms.singleInput name="code" class="mt-2" title="{{__('Product Code')}}" type="text" id="code" :value="old('code')" />

                                <div class="mb-3">
                                    <select name="makeup_sub_category_id" class="block w-full mt-1 rounded-md">
                                        <option value="{{$makeupSubCategory->id}}">{{$makeupSubCategory->title}}</option>
                                    </select>

                                </div>
                                <x-backend.forms.singleInput name="shortDefination" class="mt-2" title="{{__('Short Defination')}}" type="text" id="shortDefination" :value="old('shortDefination')" />
                                <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old('description')" />
                                <x-backend.forms.textarea name="test" class="mt-2" title="{{__('Test')}}" id="test" :value="old('test')" />
                                <x-backend.forms.textarea name="result" class="mt-2" title="{{__('Result')}}" id="result" :value="old('result')" />
                                <x-backend.forms.textarea name="howToUse" class="mt-2" title="{{__('How To Use')}}" id="howToUse" :value="old('howToUse')" />
                                <x-backend.forms.textarea name="pack" class="mt-2" title="{{__('Pack')}}" id="pack" :value="old('pack')" />
                                <x-backend.forms.textarea name="ingredient" class="mt-2" title="{{__('Ingredient')}}" id="ingredient" :value="old('ingredient')" />
                                <x-backend.forms.singleInput name="weight" class="mt-2" title="{{__('Weight')}}" type="text" id="weight" :value="old('weight')" />
                                <x-backend.forms.singleInput name="pao" class="mt-2" title="{{__('PAO')}}" type="text" id="pao" :value="old('pao')" />
                                <x-backend.forms.singleInput name="origin" class="mt-2" title="{{__('Origin')}}" type="text" id="origin" :value="old('origin')" />

                                <div class="form-group mb-3">
                                    <label for="images" class="form-label">{{__('Image') }}</label>
                                    <input type="file" name="images[]" class="form-control" id="images" multiple>
                                </div>
                                @php
                                $radioUnit=['active','inactive'];
                                @endphp
                                <x-backend.forms.radioButton name="is_active" :radioUnit="$radioUnit" />

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img style="height:400px" src="{{asset('storage/makeupSubCategory/'.$makeupSubCategory->images)}}" alt="">
                </div>
                <div class="col pt-5">
                    <div class="row ">
                        <div class="col-3">
                            <h5>{{__('Category')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupSubCategory->makeup->title}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Description')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupSubCategory->description}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Status')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>
                                @if($makeupSubCategory->is_active==1)

                                <a href="{{route('makeupSubCategory.inactive',$makeupSubCategory->id)}}" class="btn btn-sm link-danger">Active</a>
                                @else

                                <a href="{{route('makeupSubCategory.active',$makeupSubCategory->id)}}" class="btn btn-sm link-success">Inactive</a>
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>
        <hr>
        <br>


    </div>
    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Name')}}</th>
                <th scope="col-4" class="col-2 text-truncate">{{__('Short Defination')}}</th>
                <th scope="col">{{__('Weight')}}</th>
                <th scope="col">{{__('Origin')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @if( $makeupSubCategory->makeupProduct !==null)
            @foreach($makeupSubCategory->makeupProduct as $product)

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->title }}</td>
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
            @endif
        </tbody>
    </table>
</x-backend.master>