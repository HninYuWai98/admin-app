@extends('layouts.app');

@section('content')

<section class="content-header bg-dark">
    <div class="container-fluid text-center">
          <h1 class="font-weight-bold">Create Brand</h1>
    </div>
  </section>

    <div class="card-body bg-dark text-white col-5 mx-auto mt-5 p-4">

        <form action={{route('brands.store')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-7 mb-3 mx-auto">
                <label for="name" class="mb-2">Enter Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Brand name" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mt-2 row">
                <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add">
            </div>
        </form>

    </div>





@endsection


