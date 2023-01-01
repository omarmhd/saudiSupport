@extends('layouts.app')

@section("content")
<div class="container mb-100">
    <div class="row justify-content-md-center mb-5">
        <div class="col col-lg-2" >


            <img  class="w-20" width="150px" src="https://i0.wp.com/saudigamerz.com/wp-content/uploads/2021/07/logo-A-300x300-1.png?fit=300%2C300&ssl=1" alt="">
        </div>



    </div>
    <form action="{{route("search")}}" method="get">
    <div class="row justify-content-md-center mb-5">


        <div class="input-group" style="width:30%">




            <input type="text" class="form-control" placeholder="search" name="search" aria-label="Input group example" aria-describedby="basic-addon1">
            <button class="btn btn-primary"><span class="" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
</svg>
              </span></button>
        </div>



    </div>
    </form>
    <div class="row text-center">

        @foreach($departments as  $department)
            <div class="col-3">
                <a href="{{route("departments.show",['department'=>$department])}}">
            <div class="card  mb-4">
                <div class="card-body" style="background: #{{$department->color}}">
                    <h4 class="card-title">{{$department->name}}</h4>
                    <h5 class="card-text "  style="color: #cfcfcfcf">({{$department->orders->count()}})</h5>
                </div>
            </div>
                </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
