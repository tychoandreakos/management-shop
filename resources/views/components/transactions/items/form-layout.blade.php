<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('brands.store')  }}" method="post">
                    @csrf
                    @include('components.transactions.items.forms')
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->


@include('components.brands.back')
