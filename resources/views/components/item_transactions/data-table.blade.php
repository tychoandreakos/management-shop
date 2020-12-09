
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example23" class="display nowrap table table-hover align-middle table-striped table-bordered"
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity Buy</th>
                        <th>Ordering Number</th>
                        <th>Shipping Provider</th>
                        <th>Sending Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity Buy</th>
                        <th>Ordering Number</th>
                        <th>Shipping Provider</th>
                        <th>Sending Status</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($customerTransactions as $customerTransaction)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $itemTransaction->customer->name  }}</td>
                            <td class="text-nowrap align-items-center">
                                <form action="{{route('orderings.delete', $customerTransaction->id)}}"
                                      class="d-flex justify-content-center" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="justify-content-center" href="{{ route('products.edit', $customerTransaction->id)  }}"
                                       data-toggle="tooltip"
                                       data-original-title="Edit"> <i
                                            class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <button class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                            data-toggle="tooltip" data-original-title="Close" type="submit"><i
                                            class="ti-close" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <!-- This is data table -->
    <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endpush
