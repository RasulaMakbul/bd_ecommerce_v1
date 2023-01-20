<x-backend.master>
    <x-slot:title>
        Product Show
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Show</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
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
    <div class="container">
        <div class="row">
            <div class="col">


                <div class="caaroselTest">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                @foreach($makeupColorp->images as $image)
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
                <h2>{{$makeupColorp->title}}</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Code')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupColorp->code}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Product Name')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>
                                @if(isset($makeupColorp->makeup_product_id))
                                {{$makeupColorp->makeupProducts?->title}}

                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Costing')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupColorp->costing}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Unit Price')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupColorp->unitPrice}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h5>{{__('Stock')}}</h5>
                        </div>
                        <div class="col-1">
                            <h5>{{__(':')}}</h5>
                        </div>
                        <div class="col-8">
                            <p>{{$makeupColorp->stock}}</p>
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
</x-backend.master>