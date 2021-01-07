<div class="row">
    <div class="col-md-12">
        <div class="form-group @if($errors->has('name')) has-danger @endif">
            <label>Name*</label>
            <input value="{{ isset($itemTransaction) ? $itemTransaction->item->name : old('name')  }}" name="name"
                   type="text"
                   class="nm typeahead form-control">
            @if($errors->has('name'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if($errors->has('quantity')) has-danger @endif">
            <label>Quantity*</label>
            <input value="{{ isset($itemTransaction) ? $itemTransaction->item->quantity : old('quantity') }}"
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
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                       Rp.
                    </span>
                </div>
                <input id="uang" value="{{ isset($itemTransaction) ? $itemTransaction->item->price : old('price')  }}"
                       name="price"
                       type="text" class="price form-control">
                @if($errors->has('price'))
                    <small class="form-control-feedback"> This field has error. </small>
                @endif
            </div>
        </div>
    </div>
    <!--/span-->
    <div class="col-md-4">
        <div class="form-group @if($errors->has('sold')) has-danger @endif">
            <label>Sold*</label>
            <input name="sold"
                   value="{{ isset($itemTransaction) ? $itemTransaction->item->sold : 0  }}"
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

<input type="text" name="id_items" hidden class="id_items"
       value="{{isset($itemTransaction) ? $itemTransaction->item->id : old('id_items')}}">

@push('css')

@endpush

@push('scripts')
    @include('components.elements.input-currency')
    <script>
        (async function () {
            const path = "{{ route('items.autocomplete') }}";
            const elData = [];
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
            const nameCt = globalData.map(item => `${item.name}.${item.id}.${item.quantity}.${item.price}.${item.sold}.${item.description}`)

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

                    const [name, id, qty, price, sold, description] = matches[0].split('.');
                    elData.push(qty);
                    elData.push(format(price));
                    elData.push(sold);
                    elData.push(description);
                    elData.push(id);

                    cb([name]);
                };
            };

            $('input.nm').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'states',
                    source: substringMatcher(nameCt),
                }).bind('typeahead:select', () => {

                const [qty, price, sold, description, id] = elData;

                $('.qty').val(qty)
                $('.price').val(price)
                $('.sold').val(sold)
                $('.description').val(description)
                $('.id_items').val(id)
            });
        })()

        $('input.nm').on('input', function () {
            // Still Bug!
            if ($(this).val().length < 1) {
                $('.id_items').val("")
            }
        })
    </script>
@endpush
