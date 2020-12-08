<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('bname')) has-danger @endif">
            <label>Brand Name*</label>
            <input value="{{ old('bname')  }}" name="bname" type="text" class="nmb form-control">
            @if($errors->has('bname'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if($errors->has('location')) has-danger @endif">
            <label>Brand Location</label>
            <input value="{{ old('location') }}" name="location" type="text"
                   class="lc form-control">
            @if($errors->has('location'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
        <div class="form-group @if($errors->has('founded')) has-danger @endif">
            <label>Brand Founded</label>
            <input value="{{ old('founded')  }}" name="founded" type="text"
                   class="fd form-control">
            @if($errors->has('founded'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

<input type="text" hidden class="id_brands" value="{{old('id_brands')}}">

@push('scripts')
    <script>
        (async function () {
            const path = "{{ route('brands.autocomplete') }}";
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
            const nameCt = globalData.map(item => `${item.name}.${item.id}.${item.location}.${item.founded}`)

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

                    const [name, id, location, founded] = matches[0].split('.');
                    $('.fd').val(founded)
                    $('.lc').val(location)
                    $('.id_brands').val(id)
                    cb([name]);
                };
            };

            $('input.nmb').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                },
                {
                    name: 'states',
                    source: substringMatcher(nameCt)
                });
        })()
    </script>
@endpush
