<div class="form-body">
    <h3 class="card-title">{{ $titleSecond }}</h3>
    <hr>
    <div class="row">
        <div class="col-md-12 ">
            <div class="form-group @if($errors->has('name')) has-danger @endif">
                <label>Name</label>
                <input value="{{ old('name')  }}" name="name" type="text" class="form-control">
                @if($errors->has('name'))
                    <small class="form-control-feedback"> This field has error. </small>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group @if($errors->has('location')) has-danger @endif">
                <label>Location</label>
                <input value="{{ old('location') }}" name="location" type="text"
                       class="form-control">
                @if($errors->has('location'))
                    <small class="form-control-feedback"> This field has error. </small>
                @endif
            </div>
        </div>
        <!--/span-->
        <div class="col-md-6">
            <div class="form-group @if($errors->has('founded')) has-danger @endif">
                <label>Founded</label>
                <input value="{{ old('founded')  }}" name="founded" type="text"
                       class="form-control">
                @if($errors->has('founded'))
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
