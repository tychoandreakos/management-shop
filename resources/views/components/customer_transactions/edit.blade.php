<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $itemTransaction->id)  }}" method="post">
                    @csrf
                    @method('patch')
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
