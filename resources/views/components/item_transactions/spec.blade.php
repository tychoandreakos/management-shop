<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('spec')) has-danger @endif">
            <label>Specification Item*</label>
            <textarea class="form-control" id="summary-ckeditor" rows="3"
                      name="spec">{{ isset($itemTransaction) ? $itemTransaction->spesificationItem->property : old('spec')  }}</textarea>
            @if($errors->has('spec'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

@isset($itemTransaction)
    <input type="text" name="id_specs" hidden value="{{$itemTransaction->spesificationItem->id}}">
@endisset
