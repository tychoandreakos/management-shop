<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <from class="form-horizontal form-material">
                    <div id="form-customers" class="form-group">
                        <div class="col-md-12 m-b-20">
                            <input type="text" hidden readonly id="url" value="{{ route('customers.store')  }}">
                            <input type="text" hidden readonly id="back" value="{{ route('customers.home')  }}">
                            <input type="text" required name="name" class="form-control"
                                   placeholder="Customer name"></div>
                        <div class="col-md-12 m-b-20">
                            <input type="email" required name="email" class="form-control"
                                   placeholder="Email"></div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" required name="num_telp" class="form-control"
                                   placeholder="Phone"></div>
                    </div>
                </from>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit" class="btn btn-info waves-effect"
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

@push('scripts')
    <script src="{{ asset('assets/js/app.js')  }}"></script>
@endpush
