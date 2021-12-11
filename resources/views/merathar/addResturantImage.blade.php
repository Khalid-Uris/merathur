@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('resturantImage.store')}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        RESTURANT IMAGE ADD
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Dish</label>
                            <select name="dish_id"  class="form-control form-control-solid">
                                <option value="">Please Select Dish</option>
                                @foreach ($resturant as $item)
                                <option value="{{$item->dish_id}}">{{$item->dish_name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('dish_id'))
                                <div class="text text-danger">{{$errors->first('dish_id')}}</div>
                             @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Resturant Image</label>
                            <input id="my-input" class="form-control" type="file" name="resturant_image"  value="{{old('resturant_image')}}">

                            @if ($errors->has('resturant_image'))
                            <div class="text text-danger">{{$errors->first('resturant_image')}}</div>
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
