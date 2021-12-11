@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('city.update',$edit->city_id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        EDIT CITY
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">City Name</label>
                            <input id="my-input" class="form-control" type="text" name="city_name" placeholder="Enter Name" value="{{$edit->city_name}}">
                            @if ($errors->has('city_name'))
                            <div class="text text-danger">{{$errors->first('city_name')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">History</label>
                            <input id="my-input" class="form-control" type="text" name="history" placeholder="Enter Name" value="{{$edit->history}}">
                            @if ($errors->has('history'))
                            <div class="text text-danger">{{$errors->first('history')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">City Image</label>
                            <input id="my-input" class="form-control" type="file" name="city_image">

                            <input type="hidden" value="{{$edit->city_image}}" name="previous_image">

                            @if ($errors->has('city_image'))
                            <div class="text text-danger">{{$errors->first('city_image')}}</div>
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
