<x-backend.master>
    <x-slot:title>
        {{__('Product with color edit')}}
    </x-slot:title>

    <x-backend.forms.errorMessage />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">{{__('Product with color edit')}}</h2>
        <h2 class="h2">{{$makeupColorp->title}}</h2>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <form action="{{route('makeupColorp.update',$makeupColorp->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="{{$makeupColorp->id}}" hidden>

                <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Color Name')}}" type="text" id="title" :value="old('title',$makeupColorp->title)" />
                <x-backend.forms.singleInput name="code" class="mt-2" title="{{__('Color Code')}}" type="text" id="code" :value="old('code',$makeupColorp->code)" />

                <div class="mb-3">
                    <select name="makeup_product_id" class="block w-full mt-1 rounded-md">
                        <option value="">{{__('Select product')}}</option>
                        @foreach ($makeupProduct as $product)

                        <option @selected($product->id == $makeupColorp->makeup_product_id)
                            value="{{$product->id}}">{{$product->title}}</option>
                        @endforeach
                    </select>

                </div>
                <x-backend.forms.singleInput name="costing" class="mt-2" title="{{__('Costing')}}" type="number" id="costing" :value="old('costing',$makeupColorp->costing)" />

                <x-backend.forms.singleInput name="unitPrice" class="mt-2" title="{{__('Unit Price')}}" type="number" id="unitPrice" :value="old('unitPrice',$makeupColorp->unitPrice)" />
                <x-backend.forms.singleInput name="stock" class="mt-2" title="{{__('Stock')}}" type="number" id="stock" :value="old('stock',$makeupColorp->stock)" />

                <div class="form-group mb-3">
                    <label for="image" class="form-label">{{__('Image') }}</label>
                    <input type="file" name="images[]" class="form-control" id="image" multiple>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{__('Cancel')}}</a>
            </form>
        </div>
    </div>
</x-backend.master>