<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id)  }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <h3 class="card-title">{{ $titleSecond }}</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group @if($errors->has('name')) has-danger @endif">
                                    <label>Name</label>
                                    <input value="{{ $category->name  }}" name="name" type="text" class="form-control">
                                    @if($errors->has('name'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                            </div>
                        </div>
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


@include('components.categories.back')
