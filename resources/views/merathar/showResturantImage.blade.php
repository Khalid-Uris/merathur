@extends('merathar.master')
@section('content')

<section class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <div class="text-center">
                            <h3 class="">RESTURANT IMAGE SHOW</h3>
                            <a href="{{Route('resturantImage.index')}}" class="btn btn-primary float-right">RESTURANT IMAGE ADD</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Dish</th>
                                <th>Resturant Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($show as $item)
                              <tr>
                                  <td>{{$item->dish_name}}</td>
                                  <td>{{$item->resturant_image}}</td>
                                  <td>
                                      <a href="{{Route('resturantImage.edit',$item->resturant_image_id)}}" class="btn btn-primary">Edit</a>
                                      <a href="{{Route('resturantImage.destroy',$item->resturant_image_id)}}" class="btn btn-danger">Delete</a>
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
