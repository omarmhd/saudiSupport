@extends('layouts.app')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Tables</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Data Tables</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="pr-1 mb-3 mb-xl-0">--}}
            {{--                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>--}}
            {{--            </div>--}}
            {{--            <div class="mb-3 mb-xl-0">--}}
            {{--                <div class="btn-group dropdown">--}}
            {{--                    <button type="button" class="btn btn-primary">14 Aug 2019</button>--}}
            {{--                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                        <span class="sr-only">Toggle Dropdown</span>--}}
            {{--                    </button>--}}
            {{--                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">--}}
            {{--                        <a class="dropdown-item" href="#">2015</a>--}}
            {{--                        <a class="dropdown-item" href="#">2016</a>--}}
            {{--                        <a class="dropdown-item" href="#">2017</a>--}}
            {{--                        <a class="dropdown-item" href="#">2018</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row row-sm">
        <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">@lang('site.add_user')</h4>
                    <p class="mb-2"></p>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" action="{{route('users.store')}}" method="post" >
                        @csrf
                        <div class="form-group">

                            <input type="text"
                                   id="name"
                                   name="name"
                                   class="form-control"
                                   value="{{old('name')}}"
                                   placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="email"
                                   id="email"
                                   name="email"
                                   class="form-control"


                                   value="{{old('email')}}"
                                   placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="text"
                                   id="password"
                                   class="form-control"
                                   name="password"
                                   value=""
                                   placeholder="password">
                        </div>
                        <div class="form-group mb-0 justify-content-end">
                            <div class="checkbox">
                                <div class="custom-checkbox custom-control">

                                </div>
                            </div>
                        </div>
                        @php
                            $models=['users' ];
                            $maps=['create','update','read','delete']

                        @endphp


                        <div class="card">
                            <div class="card-body">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav nav-tabs profile navtab-custom panel-tabs">

                                        @foreach($models as $key=>$value)

                                            <li>
                                                <a href="#{{$value}}" data-toggle="tab" aria-expanded="true" class="{{$key==0?'active':'' }}"> <span class="visible-xs"><i class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs"></span> @lang("site.$value") </a>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div>
                                <div class="tab-content border-left border-bottom border-right border-top-0 p-4">



                                    @foreach($models as $key=>$model)
                                        <div class="tab-pane {{$key==0?'active':'' }}" id="{{$model}}">
                                            <div class="row">
                                                @foreach($maps as $map)

                                                    <div class="col-lg-2">
                                                        <label class="ckbox">
                                                            <input type="checkbox"  name="permissions[]" value="{{$model}}-{{$map}}">
                                                            <span>{{$map}}</span>
                                                        </label>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="btn btn-primary">@lang('site.add')</button>
                                <button type="submit" class="btn btn-secondary">@lang('site.cancel')</button>
                            </div>
                        </div>







                    </form>
                </div>
            </div>
        </div>
@endsection
