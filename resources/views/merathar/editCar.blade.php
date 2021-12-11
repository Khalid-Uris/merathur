@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('car.update',$edit->car_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        EDIT CAR
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Car Model</label>
                            <input id="my-input" class="form-control" type="text" name="car_model" placeholder="Enter Car Model"  value="{{$edit->car_model}}">

                            @if ($errors->has('car_model'))
                            <div class="text text-danger">{{$errors->first('car_model')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Driver Experience</label>
                            <input id="my-input" class="form-control" type="text" placeholder="Enter Driver Experience" name="driver_experience"  value="{{$edit->driver_experience}}">

                            @if ($errors->has('driver_experience'))
                            <div class="text text-danger">{{$errors->first('driver_experience')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Contact Number</label>
                            <input id="my-input" class="form-control" type="text" name="contact_number" placeholder="Enter Contact Number"  value="{{$edit->contact_number}}">

                            @if ($errors->has('contact_number'))
                            <div class="text text-danger">{{$errors->first('contact_number')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Driver Name</label>
                            <input id="my-input" class="form-control" type="text" placeholder="Enter Driver Name" name="driver_name"  value="{{$edit->driver_name}}">

                            @if ($errors->has('driver_name'))
                            <div class="text text-danger">{{$errors->first('driver_name')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Car Image</label>
                            <input id="my-input" class="form-control" type="file" name="car_image">

                            <input type="hidden" value="{{old('car_image')}}" name="previous_image">

                            @if ($errors->has('car_image'))
                            <div class="text text-danger">{{$errors->first('car_image')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Driver Image</label>
                            <input id="my-input" class="form-control" type="file" name="driver_image"  value="{{old('driver_image')}}">

                            @if ($errors->has('driver_image'))
                            <div class="text text-danger">{{$errors->first('driver_image')}}</div>
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
