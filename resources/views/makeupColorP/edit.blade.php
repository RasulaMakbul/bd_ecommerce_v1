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
            <h2>Under maintanense</h2>
        </div>
    </div>
</x-backend.master>