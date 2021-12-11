@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('resturant.update',$edit->dish_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        EDIT RESTURANT
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Dish Name</label>
                            <input id="my-input" class="form-control" type="text" name="dish_name" placeholder="Enter Dish Name"  value="{{$edit->dish_name}}">

                            @if ($errors->has('dish_name'))
                            <div class="text text-danger">{{$errors->first('dish_name')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">History</label>
                            <input id="my-input" class="form-control" type="text" placeholder="Enter History" name="history"  value="{{$edit->history}}">

                            @if ($errors->has('history'))
                            <div class="text text-danger">{{$errors->first('history')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="my-input">Contact Number</label>
                            <input id="my-input" class="form-control" type="text" name="contact_number" placeholder="Enter Contact Number"  value="{{$edit->contact_number}}">

                            @if ($errors->has('contact_number'))
                            <div class="text text-danger">{{$errors->first('contact_number')}}</div>
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
