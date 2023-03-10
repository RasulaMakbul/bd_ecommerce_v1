<x-backend.master>
    <x-slot:title>
        {{__('Dashboard')}}
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Dashboard')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">{{__('Share')}}</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">{{__('Export')}}</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                {{__('This Week')}}
            </button>
        </div>
    </div>

    <h2>{{__('Under Maintanence')}}</h2>
</x-backend.master>