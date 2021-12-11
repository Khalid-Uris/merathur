@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">CAR SHOW</h3>
                            <a href="{{Route('car.index')}}" class="btn btn-primary float-right">BUS ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Car Model</th>
                                <th>Driver Experience</th>
                                <th>Contact</th>
                                <th>Driver Name</th>
                                <th>Driver Image</th>
                                <th>Car Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->car_model}}</td>
                                  <td>{{$item->driver_experience}}</td>
                                  <td>{{$item->contact_number}}</td>
                                  <td>{{$item->driver_name}}</td>
                                  <td>{{$item->driver_image}}</td>
                                  <td>
                                    <img src="{{URL::asset($item->car_image)}}" alt="" class="img-responsive" height="100px" width="70px">
                                  </td>

                                  <td>
                                      <a href="{{Route('car.edit',$item->car_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('car.destroy',$item->car_id)}}" class="btn btn-danger">Delete</a>
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
