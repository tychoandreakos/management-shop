<div class="right-aside ">
    <div class="right-page-header">
        <div class="d-flex">
            <div class="align-self-center">
                <h4 class="card-title m-t-10">Customers List </h4></div>
            <div class="ml-auto">
                <input type="text" id="demo-input-search2" placeholder="Search customers"
                       class="form-control">
            </div>
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

            @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>
                        <a href="{{ route('customers.detail', $customer->id)  }}">
                            {{$customer->name}}</a>
                    </td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->num_telp}}</td>
                    <td>
                        <form action="{{ route('customers.delete', $customer->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                    class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                    data-toggle="tooltip" data-original-title="Delete"><i
                                    class="ti-close" aria-hidden="true"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">
                    <button type="button" class="btn btn-info btn-rounded" data-toggle="modal"
                            data-target="#add-contact">Add New Customer
                    </button>
                </td>
                @include('components.customers.add-customer')
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
