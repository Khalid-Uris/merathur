@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('hotel.update',$edit->hotel_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        EDIT HOTEL
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Hotel Name</label>
                            <input id="my-input" class="form-control" type="text" name="hotel_name"  value="{{$edit->hotel_name}}">
                            @if ($errors->has('hotel_name'))
                            <div class="text text-danger">{{$errors->first('hotel_name')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Hotel Image</label>
                            <input id="my-input" class="form-control" type="file" name="hotel_image"  value="{{$edit->hotel_image}}">

                            @if ($errors->has('hotel_image'))
                            <div class="text text-danger">{{$errors->first('hotel_image')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Rating</label>
                            <input id="my-input" class="form-control" type="number" name="rating"  value="{{$edit->rating}}">

                            @if ($errors->has('rating'))
                            <div class="text text-danger">{{$errors->first('rating')}}</div>
                            @endif
                        </div>

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
