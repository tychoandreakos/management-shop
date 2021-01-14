<div class="row el-element-overlay">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                @if(session('titleList'))
                    <h4 class="card-title">{{ session('titleList') }}</h4>
                @else
                    <h4 class="card-title">{{ $title }}</h4>
                @endif

                <h6 class="card-subtitle m-b-20 text-muted">you can make gallery like this</h6></div>
            <div class="col-md-6">
                @include('components.items.action')
            </div>
        </div>
    </div>
    @foreach($items as $item)
        @php
            $image = \Illuminate\Support\Facades\Storage::disk('admin_items')->url($item->itemImage->image)
        @endphp
        @include('components.items.item')
    @endforeach
</div>



