<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store')  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        @include('components.item_transactions.form')
                        @include('components.item_transactions.form-action')
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->


@include('components.item_transactions.back')

@push('scripts')
    <script>
        $('form input').on('keypress', function (e) {
            return e.which !== 13;
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('summary-ckeditor');
    </script>
@endpush
