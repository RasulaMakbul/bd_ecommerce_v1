@props(['makeups','makeupSubCategories'])

<form action="{{route('makeupProduct.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Product Name')}}" type="text" id="title" :value="old('title')" />
    <x-backend.forms.singleInput name="code" class="mt-2" title="{{__('Product Code')}}" type="text" id="code" :value="old('code')" />
    <div class="mb-3">
        <select name="makeup_id" class="block w-full mt-1 rounded-md">
            <option value="">{{__('Select Makeup')}}</option>
            @foreach ($makeups as $makeup)
            <option value="{{$makeup->id}}">{{$makeup->title}}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3">
        <select name="makeupSubCategory_id" class="block w-full mt-1 rounded-md">
            <option value="">{{__('Select Makeup Subcategory')}}</option>
            @foreach ($makeupSubCategories as $makeupSubCategory)

            <option value="{{$makeupSubCategory->id}}">{{$makeupSubCategory->title}}</option>
            @endforeach
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

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('makeupProduct.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
</form>