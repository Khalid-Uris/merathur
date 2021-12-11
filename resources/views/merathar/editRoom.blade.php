@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('room.update',$edit->room_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        ADD ROOM
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Hotel Name</label>
                            <select name="hotel_id"  class="form-control form-control-solid">
                                <option value="">Please Select Hotel Name</option>
                                @foreach ($hotel as $item)
                                @if ($item->hotel_id==$edit->hotel_id)
                                <option value="{{$item->hotel_id}}" selected >{{$item->hotel_name}}</option>
                                @else
                                <option value="{{$item->hotel_id}}">{{$item->hotel_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            @if ($errors->has('hotel_id'))
                            <div class="text text-danger">{{$errors->first('hotel_id')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Title</label>
                            <input id="my-input" class="form-control" type="text" name="title"  value="{{$edit->title}}">
                            @if ($errors->has('title'))
                            <div class="text text-danger">{{$errors->first('title')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Room Rent</label>
                            <input id="my-input" class="form-control" type="text" name="room_rent"  value="{{$edit->room_rent}}">
                            @if ($errors->has('room_rent'))
                            <div class="text text-danger">{{$errors->first('room_rent')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Contact Number</label>
                            <input id="my-input" class="form-control" type="text" name="contact_number"  value="{{$edit->contact_number}}">
                            @if ($errors->has('contact_number'))
                            <div class="text text-danger">{{$errors->first('contact_number')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Location</label>
                            <input id="my-input" class="form-control" type="text" name="location"  value="{{$edit->location}}">
                            @if ($errors->has('location'))
                            <div class="text text-danger">{{$errors->first('location')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Room Image</label>
                            <input id="my-input" class="form-control" type="file" name="room_image"  value="{{old('room_image')}}">

                            @if ($errors->has('room_image'))
                            <div class="text text-danger">{{$errors->first('room_image')}}</div>
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
