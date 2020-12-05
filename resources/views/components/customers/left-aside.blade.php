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
