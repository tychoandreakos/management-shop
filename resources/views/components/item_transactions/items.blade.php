<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('name')) has-danger @endif">
            <label>Name</label>
            <input value="{{ old('name')  }}" name="name" type="text" class="nm form-control">
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
            <input value="{{ old('quantity') }}" name="quantity" type="text"
                   class="qty form-control">
            @if($errors->has('quantity'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-4">
        <div class="form-group @if($errors->has('price')) has-danger @endif">
            <label>Price</label>
            <input value="{{ old('price')  }}" name="price" type="text" class="price form-control">
            @if($errors->has('price'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-4">
        <div class="form-group @if($errors->has('sold')) has-danger @endif">
            <label>Sold</label>
            <input name="sold" value="{{ old('sold')  }}" type="text" class="sold form-control">
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
            <textarea name="description" class="description form-control" id="exampleFormControlTextarea1"
                      rows="3">{{ old('description')  }}</textarea>
            @if($errors->has('description'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>


@push('scripts')
    <script type="text/javascript">
        (function () {
            const path = "{{ route('items.autocomplete') }}";
            $('input.nm').typeahead({
                source: function (query, process) {
                    return $.get(path, {query: query}, function (data) {
                        console.log(data)
                        $('.qty').val(data[0].quantity)
                        $('.price').val(data[0].price)
                        $('.sold').val(data[0].sold)
                        $('.description').val(data[0].description)
                        return process(data);
                    });
                }
            });

            $('input.nm').blur(function () {
                if ($(this).val() === "") {
                    $('.qty').val("")
                    $('.price').val("")
                    $('.sold').val("")
                    $('.description').val("")
                }
            })
        })()
    </script>
@endpush
