<div class="row">
    <div class="col-md-10">
        <div class="form-group @if($errors->has('iname')) has-danger @endif">
            <label>Item Name*</label>
            <input value="{{ isset($itemTransaction) ? $itemTransaction->item->name : old('iname')  }}" name="iname"
                   type="text"
                   class="iname typeahead form-control">
            @if($errors->has('iname'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group @if($errors->has('qty_buy')) has-danger @endif">
            <label>Quantity Buy*</label>
            <input value="{{ isset($itemTransaction) ? $itemTransaction->item->name : old('qty_buy')  }}" name="qty_buy"
                   type="text"
                   class="qty_buy typeahead form-control">
            @if($errors->has('qty_buy'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if($errors->has('quantity')) has-danger @endif">
            <label>Quantity*</label>
            <input disabled value="{{ isset($itemTransaction) ? $itemTransaction->item->quantity : old('quantity') }}"
                   name="quantity" type="text"
                   class="qty form-control">
            @if($errors->has('quantity'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-4">
        <div class="form-group @if($errors->has('price')) has-danger @endif">
            <label>Price*</label>
            <input disabled value="{{ isset($itemTransaction) ? $itemTransaction->item->price : old('price')  }}"
                   name="price"
                   type="text" class="price form-control">
            @if($errors->has('price'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-4">
        <div class="form-group @if($errors->has('sold')) has-danger @endif">
            <label>Sold*</label>
            <input disabled name="sold"
                   value="{{ isset($itemTransaction) ? $itemTransaction->item->sold : old('sold')  }}"
                   type="text" class="sold form-control">
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
                      rows="3">{{ isset($itemTransaction) ? $itemTransaction->item->description : old('description')  }}</textarea>
            @if($errors->has('description'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

<input type="text" name="item_id" hidden class="item_id"
       value="{{isset($itemTransaction) ? $itemTransaction->item->id : old('item_id')}}">


@push('scripts')
    <script>
        (async function () {
            const path = "{{ route('items.autocomplete') }}";
            const asyncExample = async () => {
                let data;
                try {
                    data = await fetch(path);
                } catch (err) {
                    console.log(err);
                }
                return await data.json();
            };

            const globalData = await asyncExample();
            const nameCt = globalData.map(item => `${item.name}.${item.id}.${item.quantity}.${item.price}.${item.sold}`)

            const substringMatcher = function (strs) {
                return function findMatches(q, cb) {
                    let matches;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function (i, str) {
                        if (substrRegex.test(str)) {
                            matches.push(str);
                        }
                    });

                    const [name, id, qty, price, sold] = matches[0].split('.');
                    $('.qty').val(qty)
                    $('.price').val(price)
                    $('.sold').val(sold)
                    $('.item_id').val(id)
                    cb([name]);
                };
            };

            $('input.iname').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'states',
                    source: substringMatcher(nameCt)
                });

            $('input.iname').blur(function () {
                if ($(this).val() === "") {
                    $('.item_id').val("")
                }
            })
        })()
    </script>
@endpush
