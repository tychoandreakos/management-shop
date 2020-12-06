<div class="tab-pane" id="settings" role="tabpanel">
    <div class="card-body">
        @include('components.detail.error')
        <form action="{{ route('customers.update', $customer->id)  }}" class="form-horizontal form-material"
              method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <input type="hidden">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                    <input type="text" name="name" placeholder="Insert customer name" value="{{ $customer->name  }}"
                           class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label for="example-email" class="col-md-12">Email</label>
                <div class="col-md-12">
                    <input type="email" name="email" placeholder="Insert customer email" value="{{ $customer->email  }}"
                           class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Phone No</label>
                <div class="col-md-12">
                    <input type="text" name="num_telp" placeholder="Insert customer phone no"
                           value="{{ $customer->num_telp  }}"
                           class="form-control form-control-line">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">Suggest</label>
                <div class="col-md-12">
                    <textarea placeholder="Insert customer suggestion" name="suggest" rows="5"
                              class="form-control form-control-line">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
