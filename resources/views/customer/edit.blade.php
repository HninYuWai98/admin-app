@extends('layouts.app');

@section('content')

<section class="content-header bg-dark">
    <div class="container-fluid text-center">
          <h1 class="font-weight-bold">Edit Category</h1>
    </div>
</section>

  <div class="card-body bg-dark text-white col-5 mx-auto mt-5 p-4">

    <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group col-7 mb-3 mx-auto">
            <label for="image" class="mb-1">Enter Image</label>
                <input type="file" class="form-control  bg-white pt-1 @error('image') is-invalid @enderror" id="image" name="image" value="{{ $customer->image }}">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
        </div>

        <div class="form-group col-7 mb-3 mx-auto">
            <label for="name" class="mb-1">Enter Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $customer->name }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>

        <div class="form-group col-7 mb-3 mx-auto">
            <label for="phone" class="mb-1">Enter Phone</label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $customer->phone }}">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
        </div>

        <div class="mb-3 row">
            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
        </div>
    </form>

</div>
</div>


@endsection
