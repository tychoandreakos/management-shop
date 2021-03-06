<div class="col-lg-8 col-md-7">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <div>
                    <h4 class="card-title">Yearly Earning</h4>
                </div>
                <div class="ml-auto">
                    <ul class="list-inline">
                        <li>
                            <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Customers
                            </h6></li>
                        <li>
                            <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Orderings
                            </h6></li>

                    </ul>
                </div>
            </div>
            <div id="morris-area-chart2" style="height: 405px;"></div>
        </div>
    </div>
    @include('components.dashboards.product-overview-list')
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            // ==============================================================
            // Product chart
            // ==============================================================
            Morris.Area({
                element: 'morris-area-chart2',
                data: JSON.parse(@json($graphStats)),
                xkey: 'period',
                ykeys: ['Customers', 'Orderings'],
                labels: ['Customers', 'Orderings'],
                pointSize: 0,
                fillOpacity: 0.4,
                pointStrokeColors: ['#b4becb', '#01c0c8'],
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                lineWidth: 0,
                smooth: true,
                hideHover: 'auto',
                lineColors: ['#b4becb', '#01c0c8'],
                resize: true

            });
        })
    </script>
@endpush
