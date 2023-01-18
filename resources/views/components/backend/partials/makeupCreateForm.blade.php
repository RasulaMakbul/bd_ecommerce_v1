<form action="{{route('makeup.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Category Name')}}" type="text" id="title" :value="old('title')" />
    <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old('description')" />
    @php
    $radioUnit=['active','inactive'];
    @endphp
    <x-backend.forms.radioButton name="is_active" :radioUnit="$radioUnit" />

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('makeup.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
</form>