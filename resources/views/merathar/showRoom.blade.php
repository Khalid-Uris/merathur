@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">ROOM SHOW</h3>
                            <a href="{{Route('room.index')}}" class="btn btn-primary float-right">ROOM ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Hotel Name</th>
                                <th>Title</th>
                                <th>Room Rent</th>
                                <th>Contact No</th>
                                <th>Location</th>
                                <th>Room Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->hotel_name}}</td>
                                  <td>{{$item->title}}</td>
                                  <td>{{$item->room_rent}}</td>
                                  <td>{{$item->contact_number}}</td>
                                  <td>{{$item->location}}</td>
                                  <td>{{$item->room_image}}</td>
                                  <td>
                                      <a href="{{Route('room.edit',$item->room_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('room.destroy',$item->room_id)}}" class="btn btn-danger">Delete</a>
                                  </td>
                              </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
