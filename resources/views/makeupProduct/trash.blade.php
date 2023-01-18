<x-backend.master>
    <x-slot:title>
        {{__('Makeup Products Trashed')}}
    </x-slot:title>

    <x-backend.forms.message />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{__('Makeup Products Trashed')}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" aria-current="page" href="{{route('makeupProduct.index')}}">
                <i class="fa-solid fa-book"></i> {{__('Makeup Products')}}
            </a>
        </div>
    </div>

    <h2>{{__('Trashed')}}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('Image')}}</th>
                <th scope="col">{{__('Subcategory Name')}}</th>
                <th scope="col">{{__('Category Name')}}</th>
                <th scope="col-4" class="col-2 text-truncate">{{__('Description')}}</th>
                <th scope="col">{{__('Products')}}</th>
                <th scope="col">{{__('Status')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>
</x-backend.master>