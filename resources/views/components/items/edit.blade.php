<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">{{ $title  }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('items.update', $item->id)  }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <h3 class="card-title">{{ $titleSecond }}</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group @if($errors->has('name')) has-danger @endif">
                                    <label>Name</label>
                                    <input value="{{ $item->name  }}" name="name" type="text" class="form-control">
                                    @if($errors->has('name'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('quantity')) has-danger @endif">
                                    <label>Quantity</label>
                                    <input value="{{ $item->quantity }}" name="quantity" type="text"
                                           class="form-control">
                                    @if($errors->has('quantity'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('price')) has-danger @endif">
                                    <label>Price</label>
                                    <input value="{{ $item->price  }}" name="price" type="text" class="form-control">
                                    @if($errors->has('price'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-4">
                                <div class="form-group @if($errors->has('sold')) has-danger @endif">
                                    <label>Sold</label>
                                    <input name="sold" value="{{ $item->sold }}" type="text" class="form-control">
                                    @if($errors->has('sold'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group @if($errors->has('description')) has-danger @endif">
                                    <label>Description Item</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                              rows="3">{{ $item->description  }}</textarea>
                                    @if($errors->has('description'))
                                        <small class="form-control-feedback"> This field has error. </small>
                                    @endif
                                </div>
                                @include('components.items.dropify')
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Save
                                    </button>
                                    <button id="_back" type="button" class="btn btn-inverse">Cancel</button>
                                </div>
                            </div>
                            <!--/span-->

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Row -->

@include('components.items.back')
