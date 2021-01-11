<div class="col-lg-4 col-xlg-3 col-md-5">
    <div class="card">
        <img class="card-img" src="{{ asset('assets/images/background/socialbg.jpg')  }}"
             alt="customer-img">
        <div class="card-img-overlay card-inverse social-profile d-flex ">
            <div class="align-self-center">
                @if(strlen($customer->image) > 0)
                    <img src="{{ $customer->image  }}"
                         class="img-circle thumb-post"
                         width="100" height="100">
                @else
                    <img src="{{ asset('assets/images/users/1.jpg')  }}"
                         class="img-circle"
                         width="100">
                @endif
                <h4 class="card-title mt-2">{{ explode(" ", $customer->name)[0]  }}</h4>
                @if(isset($customer->suggestion))
                    <p class="text-white">{{ $customer->suggestion  }}</p>
                @else
                    <p class="tex-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.
                        Praesent
                        libero. Sed cursus ante dapibus diam. </p>
                @endif
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <small class="text-muted">Full Name</small>
            <h6>{{ $customer->name }}</h6>

            <small class="text-muted p-t-30 db">Phone</small>
            <h6>{{ $customer->num_telp  }}</h6>

            <small class="text-muted p-t-30 db mb-1">Customer Label</small>
            @if(!$customer->customerLabelTransaction->isEmpty())
                <ul>
                    @foreach($customer->customerLabelTransaction as $label)
                        <li>
                            <h6>{{ $label->customerLabel->name }}</h6>
                        </li>
                    @endforeach
                </ul>
            @else
                <h6>This customer don't assigned to any customer label</h6>
            @endif

        </div>
    </div>
</div>

@push('css')
    <style>
        .thumb-post {
            object-fit: cover; /* Do not scale the image */
            object-position: center; /* Center the image within the element */
        }
    </style>
@endpush
