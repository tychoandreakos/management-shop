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
                            <img src="{{ asset('assets/images/gallery/chair.jpg')  }}" alt="iMac" width="80">
                        </td>
                        <td>{{ $productOverview->item->shipProviderTransaction->qty_buy  }}</td>
                        <td>10-7-2017</td>
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
        </div>
    </div>
</div>
