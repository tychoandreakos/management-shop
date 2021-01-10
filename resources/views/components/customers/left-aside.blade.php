<div class="left-aside bg-light-part">
    <ul class="list-style-none">
        <li class="box-label"><a href="javascript:void(0)">All Customers <span>{{ $allCustomers  }}</span></a>
        </li>
        <li class="divider"></li>
        @foreach($customerLabels as $customerLabel)
            <li><a href="javascript:void(0)">{{ $customerLabel->name  }}
                    <span>{{ $customerLabel->customer_label_transaction_count  }}</span></a></li>
        @endforeach

        <li class="box-label mt-3"><a href="javascript:void(0)" data-toggle="modal"
                                      data-target="#myModal" class="btn btn-info text-white">+ Create
                New Label</a></li>
        <div id="myModal" class="modal fade in" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Label</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <from class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-12">Name of Label</label>
                                <div class="col-md-12">
                                    <input name="name" type="text" class="form-control"
                                           placeholder="type name"></div>
                            </div>
                        </from>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="save-label" class="btn btn-info waves-effect"
                                data-dismiss="modal">Save
                        </button>
                        <button type="button" class="btn btn-default waves-effect"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </ul>
</div>


@push('scripts')
    <script>
        $(document).ready(function () {
            const url = "{{ route("customer-labels.store")  }}"
            const redirect = "{{ route("customers.home")  }}"
            $('#save-label').click(function () {
                saveMe()
            })

            $('input[name="name"]').on('keypress', function (e) {
                if (e.which === 13) saveMe()
            })

            // next
            function validator() {
            }

            function saveMe() {
                $.post(url, {
                    _token: $('meta[name="_token"]').attr('content'),
                    name: $('input[name="name"]').val()
                }).done(function () {
                    window.location.href = redirect
                }).fail(function () {
                    console.log('error')
                })
            }
        })
    </script>
@endpush
