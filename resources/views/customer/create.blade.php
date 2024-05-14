@extends('layouts.app');

@section('content')

<section class="content-header bg-dark">
    <div class="container-fluid text-center">
          <h1 class="font-weight-bold">Create department</h1>
    </div>
  </section>

    <div class="card-body bg-dark text-white col-5 mx-auto mt-5 p-4">

        <form action={{route('customers.store')}} method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group col-7 mx-auto mb-5">
                <label for="image" class="mb-1">Enter Image</label>
                <input type="file" class="form-control bg-white pt-1" id="image" name="image" value="{{old('image')}}">
            </div>

            <div class="form-group col-7 mb-3 mx-auto">
                <label for="name" class="mb-2">Enter Department Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Customer name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group col-7 mb-3 mx-auto">
                <label for="phone" class="mb-2">Enter Phone</label>
                <div class="row">
                    <div class="col-2 mx-2 text-center bg-white pt-1">+95</div>
                    <input type="number" class="form-control col-9" id="phone" name="phone" placeholder="phone" value="{{old('phone')}}">
                </div>

                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>


            <div class="mt-2 row">
                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add">
            </div>
        </form>

    </div>





@endsection


