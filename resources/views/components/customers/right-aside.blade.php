<!-- /.left-aside-column-->
<div class="right-aside ">
    <div class="right-page-header">
        <div class="d-flex">
            <div class="align-self-center">
                <h4 class="card-title m-t-10">Customers List </h4></div>
            <div class="ml-auto">
                <input type="text" id="demo-input-search2" placeholder="search customers"
                       class="form-control"></div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list"
               data-page-size="10">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>
                    <a href="app-contact-detail.html"><img src="../assets/images/users/1.jpg"
                                                           alt="user" class="img-circle"/>
                        Genelia Deshmukh</a>
                </td>
                <td>genelia@gmail.com</td>
                <td>+123 456 789</td>
                <td>
                    <button type="button"
                            class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                            data-toggle="tooltip" data-original-title="Delete"><i
                            class="ti-close" aria-hidden="true"></i></button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">
                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal"
                            data-target="#add-contact">Add New Contact
                    </button>
                </td>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×
                                </button>
                            </div>
                            <div class="modal-body">
                                <from class="form-horizontal form-material">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Type name"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Email"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Phone"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Designation"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Age"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Date of joining"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"
                                                   placeholder="Salary"></div>
                                        <div class="col-md-12 m-b-20">
                                            <div
                                                class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                <span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                <input type="file" class="upload"></div>
                                        </div>
                                    </div>
                                </from>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info waves-effect"
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
                <td colspan="7">
                    <div class="text-right">
                        <ul class="pagination"></ul>
                    </div>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- .left-aside-column-->
</div>
