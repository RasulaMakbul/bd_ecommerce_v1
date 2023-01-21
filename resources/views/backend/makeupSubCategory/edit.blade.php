<x-backend.master>
    <x-slot:title>
        {{__('Edit Makeup Category')}}
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Edit Makeup Category')}}</h1>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <form action="{{route('makeupSubCategory.update',$makeupSubCategory->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="{{$makeupSubCategory->id}}" hidden>

                <x-backend.forms.singleInput type="text" name="title" class="mt-2" title="{{__('Subcategory Name')}}" id="title" :value="old('title',$makeupSubCategory->title)" />

                <div class="mb-3">
                    <label for="title" class="form-label">{{__('Category Name')}}</label>

                    <select name="makeup_id" class="block w-full mt-1 rounded-md">
                        @foreach ($makeups as $makeup)
                        <option @selected($makeup->id == $makeupSubCategory->makeup_id)
                            value="{{$makeup->id}}">{{$makeup->title}}</option>
                        @endforeach
                    </select>
                </div>

                <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old('description',$makeupSubCategory->description)" />

                <x-backend.forms.singleInput type="file" name="image" class="mt-2" title="{{__('Image')}}" id="image" :value="old('image',$makeupSubCategory->image)" />


                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" @if ($makeupSubCategory->is_active==1) checked @endif>
                    <label class="form-check-label" for="is_active">{{__('Active')}}</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('makeupSubCategory.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            </form>
        </div>
    </div>
</x-backend.master>