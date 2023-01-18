<x-backend.master>
    <x-slot:title>
        {{__('Create Makeup Product')}}
    </x-slot:title>

    <x-backend.forms.errorMessage />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Create Makeup Product')}}</h1>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <x-backend.partials.makeupProductCreate :makeups="$makeups" :makeupSubCategories="$makeupSubCategories" />
        </div>
    </div>
</x-backend.master>