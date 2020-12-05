<div class="col-lg-4 col-xlg-3 col-md-5">
    <div class="card"><img class="card-img" src="{{ asset('assets/images/background/socialbg.jpg')  }}"
                           alt="Card image">
        <div class="card-img-overlay card-inverse social-profile d-flex ">
            <div class="align-self-center"><img src="{{ asset('assets/images/users/1.jpg')  }}"
                                                class="img-circle"
                                                width="100">
                <h4 class="card-title mt-2">{{ $customer->name  }}</h4>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor incididunt </p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body"><small class="text-muted">Email address </small>
            <h6>{{ $customer->name }}</h6> <small class="text-muted p-t-30 db">Phone</small>
            <h6>{{ $customer->num_telp  }}</h6>
        </div>
    </div>
</div>
