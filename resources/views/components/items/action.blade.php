<div class="pull-right">
    <button type="button" id="_link" class="btn btn-primary mr-1"><i class="fa fa-check"></i> Add Item</button>
    <input type="text" readonly id="_create" hidden value="{{ route('items.create') }}">
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-info"><i class="fa fa-th"></i></button>
        <button type="button" class="btn btn-info"><i class="fa fa-list"></i></button>
    </div>
</div>

@push('scripts')
    <script>
        const link = document.getElementById('_link');
        const create = document.getElementById('_create').value;
        link.addEventListener('click', () => window.location.href = create)
    </script>
@endpush
