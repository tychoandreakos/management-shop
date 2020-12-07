<div class="pull-right">
    <button type="button" id="_link" class="btn btn-primary mr-1"><i class="fa fa-check"></i> Add Item</button>
    <input type="text" readonly id="_create" hidden value="{{ route('items.create') }}">
    <input type="text" readonly id="_grid-link" hidden value="{{route('items.home')}}">
    <input type="text" readonly id="_list-link" hidden value="{{route('items.home_list')}}">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" id="_grid" class="btn btn-info"><i class="fa fa-th"></i></button>
        <button type="button" id="_list" class="btn btn-info"><i class="fa fa-list"></i></button>
    </div>
</div>

@push('scripts')
    <script>
        const link = document.getElementById('_link');
        const grid = document.getElementById('_grid');
        const listG = document.getElementById('_list');


        const create = document.getElementById('_create').value;
        const gridLink = document.getElementById('_grid-link').value;
        const listLink = document.getElementById('_list-link').value;

        link.addEventListener('click', () => window.location.href = create)
        grid.addEventListener('click', () => window.location.href = gridLink)
        listG.addEventListener('click', () => window.location.href = listLink)
    </script>
@endpush
