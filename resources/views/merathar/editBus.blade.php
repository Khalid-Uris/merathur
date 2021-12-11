@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('bus.update',$edit->bus_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        EDIT BUS
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Bus Name</label>
                            <input id="my-input" class="form-control" type="text" name="bus_name" placeholder="Enter Bus Name"  value="{{$edit->bus_name}}">

                            @if ($errors->has('bus_name'))
                            <div class="text text-danger">{{$errors->first('bus_name')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Timing</label>
                            <input id="my-input" class="form-control" type="time" name="timing"  value="{{$edit->timing}}">

                            @if ($errors->has('timing'))
                            <div class="text text-danger">{{$errors->first('timing')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Location</label>
                            <input id="my-input" class="form-control" type="text" name="location" placeholder="Enter Location"  value="{{$edit->location}}">

                            @if ($errors->has('location'))
                            <div class="text text-danger">{{$errors->first('location')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Bus Image</label>
                            <input id="my-input" class="form-control" type="file" name="bus_image"  value="{{old('bus_image')}}">

                            @if ($errors->has('bus_image'))
                            <div class="text text-danger">{{$errors->first('bus_image')}}</div>
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
