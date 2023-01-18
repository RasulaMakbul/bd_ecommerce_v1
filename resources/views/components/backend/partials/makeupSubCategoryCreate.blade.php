@props(['makeups'])

<form action="{{route('makeupSubCategory.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-backend.forms.singleInput type="text" name="title" class="mt-2" title="{{__('Subcategory Name')}}" id="title" :value="old('title')" />

    <div class="mb-3">
        <select name="makeup_id" class="block w-full mt-1 rounded-md">
            @foreach ($makeups as $makeup)
            <option value="{{$makeup->id}}">{{$makeup->title}}</option>
            @endforeach
        </select>

    </div>


    <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old('description')" />


    <x-backend.forms.singleInput type="file" name="image" class="mt-2" title="{{__('Image')}}" id="image" :value="old('image')" />

    @php
    $radioUnit=['active'];
    @endphp

    <x-backend.forms.radioButton name="is_active" :radioUnit="$radioUnit" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('makeupSubCategory.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>


</form>