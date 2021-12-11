@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">RESTURANT SHOW</h3>
                            <a href="{{Route('resturant.index')}}" class="btn btn-primary float-right">RESTURANT ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Dish</th>
                                <th>History</th>
                                <th>Contact Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->dish_name}}</td>
                                  <td>{{$item->history}}</td>
                                  <td>{{$item->contact_number}}</td>
                                  <td>
                                      <a href="{{Route('resturant.edit',$item->dish_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('resturant.destroy',$item->dish_id)}}" class="btn btn-danger">Delete</a>
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
