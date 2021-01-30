<div class="row">
    <div class="col-md-12 ">
        <div class="form-group @if($errors->has('ship_provider_id')) has-danger @endif">
            <label>Shipping Providers</label>
            <select class=" selectpicker" multiple data-live-search="true" name="ship_provider_id[]">
                @foreach($shipProviders as $shipProvider)
                    <option value="{{ $shipProvider->id  }}">{{ $shipProvider->name }}</option>
                @endforeach
            </select>
            @if($errors->has('ship_provider_id'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group @if($errors->has('ordering_number')) has-danger @endif">
            <label>Ordering Number*</label>
            <input class="ord form-control" type="text" name="ordering_number" required
                   value="{{ old('ordering_number')  }}">
            @if($errors->has('ordering_number'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if($errors->has('sending_status')) has-danger @endif">
            <label>Sending Status*</label>
            <select name="sending_status" class="form-control custom-select">
                <option value="send">Send</option>
                <option value="pending">Pending</option>
            </select>
            @if($errors->has('sending_status'))
                <small class="form-control-feedback"> This field has error. </small>
            @endif
        </div>
    </div>
</div>

<input type="text" hidden value="{{ old('ship_provider_transaction_id')  }}" name="ship_provider_transaction_id">

@push('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            const data = [];
            @if(isset($shipProvider))
            {{--            @foreach($shipProvider->spesificationItem->categoryTransaction as $ct)--}}
            {{--            data.push({{$ct->category_id}})--}}
            {{--            @endforEach--}}
            $('select').val(data);
            $('select').selectpicker('refresh');
            @else
            $('select').selectpicker();
            @endif
        });
    </script>
@endpush
