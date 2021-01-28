<div class="pull-right">
    <button type="button" id="add-item" class="btn btn-primary mr-1"><i class="fa fa-check"></i> Add Item</button>
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" id="_grid" class="btn btn-info"><i class="fa fa-th"></i></button>
        <button type="button" id="_list" class="btn btn-info"><i class="fa fa-list"></i></button>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#add-item').click(function () {
                window.location.href = `{{ route('items.create')  }}`
            });

            $('#_grid').click(function () {
                window.location.href = `{{ route('items.grid')  }}`
            })

            $('#_list').click(function () {
                window.location.href = `{{ route("items.list")  }}`
            })
        })

    </script>
@endpush
