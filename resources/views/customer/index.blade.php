@extends('layouts.app')

@section('content')


<section class="content-header bg-dark">
    <div class="container-fluid text-center">
          <h1 class="font-weight-bold">Department List</h1>
    </div>
  </section>

<section class="content box mt-5">
    <div class="col-10 m-auto card">
        <div class="card-body">
            <a href="{{route('customers.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="fa-solid fa-circle-plus"></i> Add Customer</a>
            <table class="table table-striped table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="{{asset('uploads/customers/'.$customer->image)}}" style="width:30px; height:30px;" alt="" title="" /></td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td class="col-3">
                            <form action="{{route('customers.destroy', $customer->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('customers.edit', $customer->id)}}" class="btn w-25 btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>

                                <button type="submit" class="btn btn-danger w-25 btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <td colspan="6">
                            <span class="text-danger">
                                <strong>No Type Found!</strong>
                            </span>
                    </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</section>


@endsection
