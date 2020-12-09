<div class="form-actions">
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>
        @if(isset($itemTransaction))
            Update
        @else
            Save
        @endif
    </button>
    <button id="_back" type="button" class="btn btn-inverse">Cancel</button>
</div>
