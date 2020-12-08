@include('components.item_transactions.typeahead')
<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('brands.store')  }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        @include('components.item_transactions.form')
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save
                            </button>
                            <button id="_back" type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->


@include('components.item_transactions.back')