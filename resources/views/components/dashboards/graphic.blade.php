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
                data: [{
                    period: '2010',
                    iMac: 0,
                    iPhone: 0,

                }, {
                    period: '2011',
                    iMac: 130,
                    iPhone: 100,

                }, {
                    period: '2012',
                    iMac: 30,
                    iPhone: 60,

                }, {
                    period: '2013',
                    iMac: 30,
                    iPhone: 200,

                }, {
                    period: '2014',
                    iMac: 200,
                    iPhone: 150,

                }, {
                    period: '2015',
                    iMac: 105,
                    iPhone: 90,

                },
                    {
                        period: '2016',
                        iMac: 250,
                        iPhone: 150,

                    }],
                xkey: 'period',
                ykeys: ['iMac', 'iPhone'],
                labels: ['iMac', 'iPhone'],
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
