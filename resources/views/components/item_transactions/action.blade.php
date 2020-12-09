<div class="pull-right">
    <button type="button" id="_link" class="btn btn-primary mr-1"><i class="fa fa-check"></i> Add Product</button>
    <input type="text" readonly id="_create" hidden value="{{ route('products.create') }}">
</div>

@push('scripts')
    <script>
        const link = document.getElementById('_link');

        const create = document.getElementById('_create').value;
        link.addEventListener('click', () => window.location.href = create)
    </script>
@endpush
