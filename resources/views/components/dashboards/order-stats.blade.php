<div class="card card-default">
    <div class="card-header">
        <div class="card-actions">
            <a class="" data-action="collapse"><i class="ti-minus"></i></a>
            <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
            <a class="btn-close" data-action="close"><i class="ti-close"></i></a>
        </div>
        <h4 class="card-title m-b-0">Order Stats</h4>
    </div>
    <div class="card-body collapse show">
        <div id="morris-donut-chart" class="ecomm-donute" style="height: 317px;"></div>
        <ul class="list-inline m-t-20 text-center">
            <li>
                <h6 class="text-muted"><i class="fa fa-circle text-info"></i> Order</h6>
                <h4 class="m-b-0">{{ $orderStats["orders"] ?? 0  }}</h4>
            </li>
            <li>
                <h6 class="text-muted"><i class="fa fa-circle text-danger"></i> Pending</h6>
                <h4 class="m-b-0">{{ $orderStats["pending"] ?? 0  }}</h4>
            </li>
            <li>
                <h6 class="text-muted"><i class="fa fa-circle text-success"></i> Delivered</h6>
                <h4 class="m-b-0">{{ $orderStats["delivered"] ?? 0  }}</h4>
            </li>
        </ul>

    </div>
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            "use strict";
            // ==============================================================
            // Morris donut chart
            // ==============================================================
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Orders",
                    value: `{{ $orderStats["orders"] ?? 0  }}`,

                }, {
                    label: "Pending",
                    value: `{{ $orderStats["pending"] ?? 0   }}`,
                }, {
                    label: "Delivered",
                    value: `{{ $orderStats["delivered"] ?? 0   }}`
                }],
                resize: true,
                colors: ['#26c6da', '#1976d2', '#ef5350']
            });
            // ==============================================================
            // sales difference
            // ==============================================================

            // ==============================================================
            // sparkline chart
            // ==============================================================
            var sparklineLogin = function () {
                $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '50',
                    barWidth: '2',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#26c6da'
                });
                $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '50',
                    barWidth: '2',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#7460ee'
                });
                $('#sparklinedash3').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '50',
                    barWidth: '2',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#03a9f3'
                });
                $('#sparklinedash4').sparkline([0, 5, 6, 10, 9, 12, 4, 9], {
                    type: 'bar',
                    height: '50',
                    barWidth: '2',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#f62d51'
                });

            }
            var sparkResize;

            $(window).resize(function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineLogin, 500);
            });
            sparklineLogin();
        })
    </script>
@endpush
