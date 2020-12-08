<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('spec')) has-danger @endif">
            <label>Specification Item*</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="spec">
                {{ old('spec')  }}
            </textarea>
            @if($errors->has('spec'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>
