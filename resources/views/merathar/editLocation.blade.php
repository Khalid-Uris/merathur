@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('location.update',$edit->location_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        LOCATION EDIT
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">City Name</label>
                            <select name="city_id"  class="form-control form-control-solid">
                                <option value="">Please Select City Name</option>
                                @foreach ($city as $item)
                                @if ($item->city_id==$edit->city_id)
                                <option value="{{$item->city_id}}" selected >{{$item->city_name}}</option>
                                @else
                                <option value="{{$item->city_id}}">{{$item->city_name}}</option>
                                @endif
                                @endforeach
                            </select>
                             @if ($errors->has('city_id'))
                            <div class="text text-danger">{{$errors->first('city_id')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Name</label>
                            <input id="my-input" class="form-control" type="text" name="location_name" placeholder="Enter Location Name" value="{{$edit->location_name}}">

                        </div>
                        @if ($errors->has('location_name'))
                        <div class="text text-danger">{{$errors->first('location_name')}}</div>
                        @endif
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
