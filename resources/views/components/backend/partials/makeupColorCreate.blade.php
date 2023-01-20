@props(['makeupProduct'])

<form action="{{route('makeupColor.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Color Name')}}" type="text" id="title" :value="old('title')" />
    <x-backend.forms.singleInput name="code" class="mt-2" title="{{__('Color Code')}}" type="text" id="code" :value="old('code')" />

    <div class="mb-3">
        <select name="makeup_product_id" class="block w-full mt-1 rounded-md">
            <option value="">{{__('Select product')}}</option>
            @foreach ($makeupProduct as $product)

            <option value="{{$product->id}}">{{$product->title}}</option>
            @endforeach
        </select>

    </div>
    <x-backend.forms.singleInput name="costing" class="mt-2" title="{{__('Costing')}}" type="number" id="costing" :value="old('costing')" />

    <x-backend.forms.singleInput name="unitPrice" class="mt-2" title="{{__('Unit Price')}}" type="number" id="unitPrice" :value="old('unitPrice')" />
    <x-backend.forms.singleInput name="stock" class="mt-2" title="{{__('Stock')}}" type="number" id="stock" :value="old('stock')" />

    <div class="form-group mb-3">
        <label for="image" class="form-label">{{__('Image') }}</label>
        <input type="file" name="images[]" class="form-control" id="image" multiple>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">{{__('Cancel')}}</a>
</form>