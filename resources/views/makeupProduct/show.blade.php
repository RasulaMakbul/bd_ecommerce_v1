<x-backend.master>
    <x-slot:title>
        Product Show
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{$makeupProduct->title}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeupProduct.edit',$makeupProduct->id)}}">
                <i class="fa-solid fa-plus"></i> {{__('Edit Product')}}
            </a>
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeupColor.create')}}">
                <i class="fa-solid fa-plus"></i> {{__('Create Color')}}
            </a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">


                <div class="caaroselTest">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($makeupProduct->images as $image)
                                <li>
                                    <img src="{{ asset('/storage/' . $image) }}" alt="multiple image" class=" border border-blue-600>
                                    <!-- class=" w-20 h-20 border border-blue-600" -->
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn">
                                < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>
                </div>



            </div>
            <div class="col">
                <h2>{{$makeupProduct->title}}</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Code')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->code}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Makeup Category')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>
                                @if(isset($makeupProduct->makeup_id))
                                {{$makeupProduct->makeup?->title}}
                                @else
                                <span class="bg-danger">{{__('Product Under Subcategory')}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Makeup Category')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>
                                @if(isset($makeupProduct->makeupSubCategory_id))
                                {{$makeupProduct->makeupSubCategory?->title}}
                                @else
                                <span class="bg-danger">{{__('Product Under Category')}}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Short Defination')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->shortDefination}}</p>
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
                            <p>{{$makeupProduct->description}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Test')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->test}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Result')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->result}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('How to Use')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->howToUse}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Pack')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->pack}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Ingredient')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->ingredient}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Weight')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->weight}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('PAO')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->pao}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Origin')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupProduct->origin}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script>
            $(function() {

                $("#exzoom").exzoom({

                    // thumbnail nav options
                    "navWidth": 40,
                    "navHeight": 40,
                    "navItemNum": 5,
                    "navItemMargin": 4,
                    "navBorder": 1,

                    // autoplay
                    "autoPlay": false,

                    // autoplay interval in milliseconds
                    "autoPlayTimeout": 2000

                });

            });
        </script>
        @endpush
    </div>

    <hr>

    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Color Name')}}</th>
                <th scope="col">{{__('ID')}}</th>
                <th scope="col">{{__('Code')}}</th>
                <th scope="col">{{__('Costing')}}</th>
                <th scope="col">{{__('Unit Price')}}</th>
                <th scope="col">{{__('Stock')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>
            @if( $makeupProduct->makeupColorP !==null)

            @foreach($makeupProduct->makeupColorP as $color)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$color->title}}</td>
                <td>{{$color->id}}</td>
                <td>{{$color->code}}</td>
                <td>{{$color->costing}}</td>
                <td>{{$color->unitPrice}}</td>
                <td>{{$color->stock}}</td>
                <td>
                    <a href="{{route('makeupColor.viewColor',$color->id)}}" class="btn btn-sm link-info"><i class="fa-solid fa-eye fs-5"></i></a>
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
            @endif
        </tbody>
    </table>

</x-backend.master>