@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('resturantImage.update',$edit->resturant_image_id)}}" method="POST">
                    @csrf
                {{-- @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif --}}
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        RESTURANT IMAGE EDIT
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Dish</label>
                            <select name="dish_id"  class="form-control form-control-solid">
                                <option value="">Please Select Hotel Name</option>
                                @foreach ($resturant as $item)
                                @if ($item->dish_id==$edit->dish_id)
                                <option value="{{$item->dish_id}}" selected >{{$item->dish_name}}</option>
                                @else
                                <option value="{{$item->dish_id}}">{{$item->dish_name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="my-input">Resturant Image</label>
                            <input id="my-input" class="form-control" type="file" name="resturant_image"  value="{{$edit->resturant_image}}">
                        </div>



                        {{-- @if ($errors->has('borrower_name'))
                            <div class="text text-danger">{{$errors->first('borrower_name')}}</div>
                        @endif --}}
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>

        </div>
    </div>
</section>

@endsection
