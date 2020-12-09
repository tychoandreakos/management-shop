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
    <script>
        $(document).ready(function () {
            const customersEl = document.getElementById('form-customers');
            const button = document.getElementById('submit');
            const customersInput = customersEl.querySelectorAll('.form-control');
            const meta = document.querySelector('meta[name="_token"]').content
            const url = document.getElementById('url').value;
            const back = document.getElementById('back').value
            const error = []
            const rule = [3, 5, 11]
            const message = ["name", "email", "phone"]

            async function postData(url = '', data = {}) {
                // Default options are marked with *
                const response = await fetch(url, {
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: 'same-origin', // include, *same-origin, omit
                    headers: {
                        'Content-Type': 'application/json',
                        // 'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-Token': meta
                    },
                    redirect: 'follow', // manual, *follow, error
                    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                    body: JSON.stringify(data) // body data type must match "Content-Type" header
                });
                return response.json(); // parses JSON response into native JavaScript objects
            }

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

            button.addEventListener('click', () => {
                let data = {};
                for (let i = 0; i < customersInput.length; i++) {
                    const item = customersInput[i];
                    const value = item.value;

                    data = {
                        ...data,
                        [item.getAttribute('name')]: value
                    }

                }

                if (error.length < 1) {
                    postData(url, data).then(data => {
                        if (data.next) {
                            window.location.href = back
                        }
                    })
                } else {
                    toastr()
                }
            })
        })
    </script>
@endpush
