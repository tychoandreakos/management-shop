@extends('components.main-wrapper')

@section('main')
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Customers</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item active">Customers</li>
            </ol>
        </div>
        <div class="">
            <button
                class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10">
                <i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- .left-right-aside-column-->
                    <div class="contact-page-aside">
                        <!-- .left-aside-column-->
                        <div class="left-aside bg-light-part">
                            <ul class="list-style-none">
                                <li class="box-label"><a href="javascript:void(0)">All Customers <span>123</span></a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)">Work <span>103</span></a></li>
                                <li><a href="javascript:void(0)">Family <span>19</span></a></li>
                                <li><a href="javascript:void(0)">Friends <span>623</span></a></li>
                                <li><a href="javascript:void(0)">Private <span>53</span></a></li>
                                <li class="box-label"><a href="javascript:void(0)" data-toggle="modal"
                                                         data-target="#myModal" class="btn btn-info text-white">+ Create
                                        New Label</a></li>
                                <div id="myModal" class="modal fade in" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Lable</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <from class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-12">Name of Label</label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control"
                                                                   placeholder="type name"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12">Select Number of people</label>
                                                        <div class="col-md-12">
                                                            <select class="form-control">
                                                                <option>All Contacts</option>
                                                                <option>10</option>
                                                                <option>20</option>
                                                                <option>30</option>
                                                                <option>40</option>
                                                                <option>Custome</option>
                                                            </select>
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
                            </ul>
                        </div>
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
                        <!-- /.left-right-aside-column-->
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span></div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                        <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/users/1.jpg')}}"
                                                              alt="user-img" class="img-circle">
                                <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/users/2.jpg')}}"
                                                              alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img ssrc="{{asset('assets/images/users/3.jpg')}}"
                                                              alt="user-img" class="img-circle">
                                <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/users/4.jpg')}}"
                                                              alt="user-img" class="img-circle">
                                <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/users/5.jpg"')}}"
                                                              alt="user-img" class="img-circle">
                                <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{asset('assets/images/users/6.jpg')}}"
                                                              alt="user-img" class="img-circle">
                                <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/7.jpg') }}"
                                                              alt="user-img" class="img-circle">
                                <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="{{ asset('assets/images/users/8.jpg')  }}"
                                                              alt="user-img" class="img-circle">
                                <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
@endsection
