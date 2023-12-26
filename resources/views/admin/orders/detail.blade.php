@extends("admin.layout")
@section("append-du-lieu-view")

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Orders</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ url('admin/orders') }}" class="btn btn-primary">Back</a>
        @if ($order->status == 0)
        <a href="{{ url('admin/orders/update/'.$order->id) }}" class="btn btn-primary">Delivery</a>
        @endif
    </div>
    <div class="card-body">
        <h3>Infomation</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td style="width: 200px;">Customer name</td>
                    <td>{{ isset($customer->name) ? $customer->name : "" }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ isset($customer->email) ? $customer->email : "" }}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>{{ isset($order->date) ? date("d/m/Y", strtotime($order->date)) : "" }}</td>
                </tr>
                <tr>
                    <td>Order price</td>
                    <td>{{ isset($order->price) ? number_format($order->price)."đ" : "" }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    @if ($order->status == 1)
                    <td style="color: red;">Đã giao hàng</td>
                    @else
                    <td>Chưa giao hàng</td>
                    @endif

                </tr>
            </table>
        </div>

        <h3>Order product list</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 100px;">Photo</th>
                        <th>Name</th>
                        <th>Price</th>
                        <td>Discount</td>
                        <td>Quantity</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $row)
                    <tr>
                        <td>
                            @if($row->photo != "" && file_exists('upload/products/'.$row->photo))
                            <img src="{{ asset('upload/products/'.$row->photo) }}" style="width: 100px;">
                            @endif
                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ number_format($row->price) }}đ</td>
                        <td>{{ $row->discount }}%</td>
                        <td>{{ $row->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
