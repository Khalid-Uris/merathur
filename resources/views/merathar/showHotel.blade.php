@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">HOTEL SHOW</h3>
                            <a href="{{Route('hotel.index')}}" class="btn btn-primary float-right">HOTAL ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Hotel Name</th>
                                <th>Hotel Image</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->hotel_name}}</td>
                                  <td>{{$item->hotel_image}}</td>
                                  <td>{{$item->rating}}</td>
                                  <td>
                                      <a href="{{Route('hotel.edit',$item->hotel_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('hotel.destroy',$item->hotel_id)}}" class="btn btn-danger">Delete</a>
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
