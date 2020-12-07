<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sold</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->name  }}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->sold}}</td>
                            <td class="text-nowrap">
                                <a href="#" data-toggle="tooltip" data-original-title="Edit"> <i
                                        class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                        class="fa fa-close text-danger"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
