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
            <a href="{{route('departments.create')}}" class="btn btn-primary btn-sm my-2 p-2"><i class="fa-solid fa-circle-plus"></i> Add New department</a>
            <table class="table table-striped table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{$department->name}}</td>
                        <td class="col-3">
                            <form action="{{route('departments.destroy', $department->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a href="{{route('departments.edit', $department->id)}}" class="btn w-25 btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>

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
