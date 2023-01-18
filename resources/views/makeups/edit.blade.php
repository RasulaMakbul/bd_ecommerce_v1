<x-backend.master>
    <x-slot:title>
        {{__('Edit Makeup Category')}}
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Edit Makeup Category')}}</h1>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <form action="{{route('makeup.update',$makeup->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="text" class="form-control" id="id" aria-describedby="id" name="id" value="{{$makeup->id}}" hidden>
                <x-backend.forms.singleInput name="title" class="mt-2" title="{{__('Category Name')}}" type="text" id="title" :value="old('title',$makeup->title)" />
                <x-backend.forms.textarea name="description" class="mt-2" title="{{__('Description')}}" id="description" :value="old(description)" ,{{$makeup->description}} />
                <div class="mb-3">
                    <label for="description" class="form-label">{{__('Description')}}</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$makeup->description}}</textarea>
                </div>
                @php
                $radioUnit = ['Active'];

                if($makeup->is_active){
                $setItemr = [0];
                } else {
                $setItemr = [];
                }
                @endphp
                <x-backend.forms.radioButton name="is_active" :radioUnit="$radioUnit" :setItemr="$setItemr" />


                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('makeup.index')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
            </form>
        </div>
    </div>
</x-backend.master>