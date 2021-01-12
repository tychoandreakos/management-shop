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
                            <input type="text" required name="name" class="form-control"
                                   placeholder="Customer name"></div>
                        <div class="col-md-12 m-b-20">
                            <input type="email" required name="email" class="form-control"
                                   placeholder="Email"></div>
                        <div class="col-md-12 m-b-20">
                            <input type="text" required name="num_telp" class="form-control"
                                   placeholder="Phone"></div>
                        @include('components.customers.file-upload')
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
    <script>
        $(document).ready(function () {
            const customersEl = document.getElementById('form-customers');
            const customersInput = customersEl.querySelectorAll('.form-control');
            const meta = document.querySelector('meta[name="_token"]').content
            const url = "{{ route('customers.store') }}"
            const home = "{{ route('customers.home')  }}"
            const error = []
            const rule = [3, 5, 11]
            const message = ["name", "email", "phone"]
            let metaImage;

            $('#input-file-now').on('change', function (el) {
                const image = el.target.files[0];
                const reader = new FileReader();

                reader.onload = function () {
                    metaImage = reader.result;
                }

                reader.readAsDataURL(image);
            })

            function elementRender() {
                return `The ${message[0]} field is required.`
            }

            function toastr() {
                $.toast({
                    heading: 'Welcome to Monster admin',
                    text: elementRender(),
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 3500
                });
            }

            $('#submit').click(function () {
                let data = {
                    image: metaImage
                };

                for (let i = 0; i < customersInput.length; i++) {
                    const item = customersInput[i];
                    const value = item.value;

                    data = {
                        ...data,
                        [item.getAttribute('name')]: value
                    }

                }

                if (error.length < 1) {
                    $.post(url, {
                        _token: meta,
                        ...data
                    }).done(() => window.location.href = home).fail(err => console.log(err));
                } else {
                    toastr()
                }
            })
        })
    </script>
@endpush
