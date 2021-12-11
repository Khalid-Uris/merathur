@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">BUS SHOW</h3>
                            <a href="{{Route('bus.index')}}" class="btn btn-primary float-right">BUS ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Bus Name</th>
                                <th>Timing</th>
                                <th>Location</th>
                                <th>Bus Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->bus_name}}</td>
                                  <td>{{$item->timing}}</td>
                                  <td>{{$item->location}}</td>
                                  <td>{{$item->bus_image}}</td>
                                  <td>
                                      <a href="{{Route('bus.edit',$item->bus_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('bus.destroy',$item->bus_id)}}" class="btn btn-danger">Delete</a>
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
