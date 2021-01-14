<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="el-card-item">
            <div class="el-card-avatar el-overlay-1">
                @if(isset($item->itemImage))
                    <img
                        class="img"
                        src="{{ $image }}"
                        alt="user"/>
                @else
                    <img src="{{asset('assets/images/big/img1.jpg')}}" alt="user"/>
                @endif
                <div class="el-overlay">
                    <ul class="el-info">
                        <li><a class="btn default btn-outline image-popup-vertical-fit"
                               href="{{ $image }}"><i
                                    class="icon-magnifier"></i></a></li>
                        <li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="el-card-content">
                <h3 class="box-title">{{ $item->name  }}</h3> <small>{{ $item->price }}</small>
                <br/>
                <div class="row mt-3">
                    <small class="col-6">Qty: {{ $item->quantity  }}</small>
                    <small class="col-6">Sold: {{ $item->sold  }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
    <style>
        .img {
            width: 200px; /* You can set the dimensions to whatever you want */
            height: 200px !important;
            object-fit: cover !important;
        }
    </style>
@endpush
