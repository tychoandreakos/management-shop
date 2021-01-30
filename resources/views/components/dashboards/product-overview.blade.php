<div class="card-body p-0 collapse show text-center">
    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
        <!-- Carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item flex-column">
                <img src="../assets/images/gallery/chair.jpg" alt="user">
                <h4 class="m-b-30">Brand New Chair</h4>
            </div>
            <div class="carousel-item flex-column">
                <img src="../assets/images/gallery/chair2.jpg" alt="user">
                <h4 class="m-b-30">Brand New Chair</h4>
            </div>
            <div class="carousel-item flex-column active carousel-item-left">
                <img src="../assets/images/gallery/chair3.jpg" alt="user">
                <h4 class="m-b-30">Brand New Chair</h4>
            </div>
            <div class="carousel-item flex-column carousel-item-next carousel-item-left">
                @if(isset($latestProduct->itemImageTransaction))
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::disk('admin_item_thumbnail_latest')->url($latestProduct->itemImageTransaction[0]->itemImage->image)  }}"
                        alt="user">
                    <h4 class="m-b-30 p-4">{{ $latestProduct->name  }}</h4>
                @else
                    <p class="align-items-center">No data available</p>
                @endif
            </div>
        </div>

    </div>
</div>
