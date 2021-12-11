@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">CITY SHOW</h3>
                            <a href="{{Route('city.index')}}" class="btn btn-primary float-right">Add City</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>City Name</th>
                                <th>History</th>
                                <th>City Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->city_name}}</td>
                                  <td>{{$item->history}}</td>
                                  <td>
                                    <img src="{{URL::asset($item->city_image)}}" alt="" class="img-responsive" height="100px" width="70px">
                                  </td>
                                  <td>
                                      <a href="{{Route('city.edit',$item->city_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('city.destroy',$item->city_id)}}" class="btn btn-danger">Delete</a>
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
