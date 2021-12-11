@extends('merathar.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12">

                <form action="{{Route('culture.update',$edit->culture_id)}}" method="POST">
                    @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <div class="card">
                    <div class="card-header font-weight-bolder">
                        Edit Culture
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">Culture</label>
                            <input id="my-input" class="form-control" type="text" name="culture" placeholder="Enter Culture"  value="{{$edit->culture}}">

                            @if ($errors->has('culture'))
                            <div class="text text-danger">{{$errors->first('culture')}}</div>
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
