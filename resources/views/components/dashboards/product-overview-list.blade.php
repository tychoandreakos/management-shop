<div class="card card-default">
    <div class="card-header">
        <div class="card-actions">
            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
            <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
        </div>
        <h4 class="card-title m-b-0">Ordering Overview</h4>
    </div>
    <div class="card-body collapse show">
        <div class="table-responsive">
            @if(!$productOverviews->isEmpty())
                <table class="table product-overview">
                    <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Photo</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productOverviews as $productOverview)
                        <tr>
                            <td>{{ $productOverview->customer->name  }}</td>
                            <td>
                                @if(isset($productOverview->item->itemImage->image))
                                    <img
                                        src="{{ \Illuminate\Support\Facades\Storage::disk('admin_item_thumbnail_ordering')->url($productOverview->item->itemImage->image)  }}"
                                        alt="iMac" width="80">
                                @else
                                    <img
                                        src=""
                                        alt="iMac" width="80">
                                @endif
                            </td>
                            <td>{{ $productOverview->item->shipProviderTransaction->qty_buy  }}</td>
                            <td>{{ \Carbon\Carbon::parse($productOverview->created_at)->diffForHumans()  }}</td>
                            <td>
                            <span
                                class="label label-success font-weight-100">{{ $productOverview->item->shipProviderTransaction->sending_status  }}</span>
                            </td>
                            <td><a
                                    href="javascript:void(0)" class="text-inverse" title=""
                                    data-toggle="tooltip" data-original-title="Delete"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No data available</p>
            @endif
        </div>
    </div>
</div>
