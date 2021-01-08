<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('name')) has-danger @endif">
            <label>Customer Name*</label>
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
    <div class="col-md-6">
        <div class="form-group @if($errors->has('email')) has-danger @endif">
            <label>Email*</label>
            <input disabled value="{{ isset($itemTransaction) ? $itemTransaction->item->quantity : old('email') }}"
                   name="email" type="email"
                   class="email form-control">
            @if($errors->has('email'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
        <div class="form-group @if($errors->has('phone')) has-danger @endif">
            <label>Phone Number*</label>
            <input disabled value="{{ isset($itemTransaction) ? $itemTransaction->item->price : old('phone')  }}"
                   name="num_telp"
                   type="text" class="num_telp form-control">
            @if($errors->has('phone'))
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
        <div class="form-group @if($errors->has('suggestion')) has-danger @endif">
            <label>Suggestion</label>
            <textarea name="suggestion" class="suggestion form-control" id="exampleFormControlTextarea1"
                      rows="3">{{ isset($itemTransaction) ? $itemTransaction->item->description : old('description')  }}</textarea>
            @if($errors->has('suggestion'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

<input type="text" name="customer_id" hidden class="id_customer"
       value="{{isset($itemTransaction) ? $itemTransaction->item->id : old('id_items')}}">


@push('scripts')
    <script>
        (async function () {
            const path = "{{ route('customers.autocomplete') }}";
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
            const nameCt = globalData.map(item => `${item.name}__${item.id}__${item.email}__${item.num_telp}`)

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

                    const [name, id, email, num_telp] = matches[0].split('__');
                    elData.push(email)
                    elData.push(num_telp)
                    elData.push(id)
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
                    source: substringMatcher(nameCt)
                }).bind('typeahead:select', function () {
                const [email, num_telp, id] = elData;
                $('.email').val(email)
                $('.num_telp').val(num_telp)
                $('.id_customer').val(id)
            });

            $('input.nm').on('input', function () {
                if ($(this).val() === "") {
                    $('.id_customer').val("")
                }
            })
        })()
    </script>
@endpush
