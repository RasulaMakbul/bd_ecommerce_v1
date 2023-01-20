<x-backend.master>
    <x-slot:title>
        {{__('Edit Makeup Product')}}
    </x-slot:title>

    <x-backend.forms.errorMessage />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Edit Makeup Product')}}</h1>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <form action="{{route('makeupProduct.update',$makeupProduct->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="{{$makeupProduct->id}}" hidden>


                <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Product Name')}}" type="text" id="title" :value="old('title',$makeupProduct->title)" />
                <x-backend.forms.singleInput name="code" class="mt-2" title="{{__('Product Code')}}" type="text" id="code" :value="old('code',$makeupProduct->code)" />
                <div class="mb-3">
                    <select name="makeup_id" class="block w-full mt-1 rounded-md">
                        <option value="">{{__('Select Makeup')}}</option>
                        @foreach ($makeups as $makeup)
                        <option @selected($makeup->id == $makeupProduct->makeup_id)
                            value="{{$makeup->id}}">{{$makeup->title}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="mb-3">
                    <select name="makeup_sub_category_id" class="block w-full mt-1 rounded-md">
                        <option value="">{{__('Select Makeup Subcategory')}}</option>
                        @foreach ($makeupSubCategories as $makeupSubCategory)

                        <option @selected($makeupSubCategory->id == $makeupProduct->makeupSubCategory_id)
                            value="{{$makeupSubCategory->id}}">{{$makeupSubCategory->title}}</option>
                        @endforeach
                    </select>

                </div>
                <x-backend.forms.singleInput name="shortDefination" class="mt-2" title="{{__('Short Defination')}}" type="text" id="shortDefination" :value="old('shortDefination',$makeupProduct->shortDefination)" />
                <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old('description',$makeupProduct->description)" />
                <x-backend.forms.textarea name="test" class="mt-2" title="{{__('Test')}}" id="test" :value="old('test',$makeupProduct->test)" />
                <x-backend.forms.textarea name="result" class="mt-2" title="{{__('Result')}}" id="result" :value="old('result',$makeupProduct->result)" />
                <x-backend.forms.textarea name="howToUse" class="mt-2" title="{{__('How To Use')}}" id="howToUse" :value="old('howToUse',$makeupProduct->howToUse)" />
                <x-backend.forms.textarea name="pack" class="mt-2" title="{{__('Pack')}}" id="pack" :value="old('pack',$makeupProduct->pack)" />
                <x-backend.forms.textarea name="ingredient" class="mt-2" title="{{__('Ingredient')}}" id="ingredient" :value="old('ingredient',$makeupProduct->ingredient)" />
                <x-backend.forms.singleInput name="weight" class="mt-2" title="{{__('Weight')}}" type="text" id="weight" :value="old('weight',$makeupProduct->weight)" />
                <x-backend.forms.singleInput name="pao" class="mt-2" title="{{__('PAO')}}" type="text" id="pao" :value="old('pao',$makeupProduct->pao)" />
                <x-backend.forms.singleInput name="origin" class="mt-2" title="{{__('Origin')}}" type="text" id="origin" :value="old('origin',$makeupProduct->origin)" />

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
        </div>
    </div>
</x-backend.master>