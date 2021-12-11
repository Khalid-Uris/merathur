@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('locationImage.update',$edit->location_image_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        LOCATION IMAGE EDIT
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Location</label>
                            <select name="location_id"  class="form-control form-control-solid">
                                <option value="">Please Select Location Name</option>
                                @foreach ($location as $item)
                                @if ($item->location_id==$edit->location_id)
                                <option value="{{$item->location_id}}" selected >{{$item->location_name}}</option>
                                @else
                                <option value="{{$item->location_id}}">{{$item->location_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if ($errors->has('location_id'))
                            <div class="text text-danger">{{$errors->first('location_id')}}</div>
                        @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Location Image</label>
                            <input id="my-input" class="form-control" type="file" name="location_image"  value="{{old('location_image')}}">

                        </div>
                        @if ($errors->has('location_image'))
                        <div class="text text-danger">{{$errors->first('location_image')}}</div>
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
