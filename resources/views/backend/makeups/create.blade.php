<x-backend.master>
    <x-slot:title>
        {{__('Create Makeup Category')}}
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Create Makeup Category')}}</h1>
    </div>

    <div class="card w-50">
        <div class="card-body">
            <x-backend.partials.makeupCreateForm />
        </div>
</x-backend.master>