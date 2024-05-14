@extends('layouts.app')

@section('content')


<section class="content-header bg-dark">
    <div class="container-fluid text-center">
          <h1 class="font-weight-bold">Order List</h1>
    </div>
  </section>

<section class="content box mt-5">
    <div class="col-10 m-auto card">
        <div class="card-body">
            <a href="{{route('orders.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="fa-solid fa-circle-plus"></i> Add New Order</a>
            <table class="table table-striped table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Order Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$order->name}}</td>
                        <td>{{$order->customer?->name}}</td>
                        <td>{{$order->product?->name}}</td>
                        <td class="col-3">
                            <form action="{{route('orders.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('orders.edit', $order->id)}}" class="btn w-25 btn-primary btn-sm"><i class="bi bi-pencil-square"></i>Edit</a>

                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6">
                            <span class="text-danger">
                                <strong>No Order Found!</strong>
                            </span>
                    </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
