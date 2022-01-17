@extends('Admin.Assets.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
            </div>
            <div class="pr-1 mb-3 mb-xl-0">
                <button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
            </div>
            <div class="mb-3 mb-xl-0">
                <div class="btn-group dropdown">
                    <button type="button" class="btn btn-primary">14 Aug 2019</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
                        <a class="dropdown-item" href="#">2015</a>
                        <a class="dropdown-item" href="#">2016</a>
                        <a class="dropdown-item" href="#">2017</a>
                        <a class="dropdown-item" href="#">2018</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="container align-items-center">

            <div class="card  box-shadow-0">
                <div class="card-header">

                    <h4 class="card-title mb-1">Campaign {{$campaign->name}}</h4>
                    <h6 class="card-title mb-1">Start Date: {{date('d-m-Y',strtotime($campaign->start_date))}}</h6>
                    <h6 class="card-title mb-1">End Date: {{date('d-m-Y',strtotime($campaign->end_date))}}</h6>
                    <h4> </h4>
                    <a href="{{route('admin.campaign-banners.create',$campaign->id)}}" class="btn btn-primary">Add Banners</a>

                </div>
                <hr>
                <div class="card-body pt-0">

                        <table class="table mg-b-0 text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Banner</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campaignBanners as $key => $campaignBanner)
                                <tr>
                                    <th>{{++$key}}</th>
                                    <td><img src="{{asset($campaignBanner->image)}}" width="100px" height="100px" alt=""></td>
                                    <td>{{$campaignBanner->banner()}}</td>
                                    <td>
                                        <form action="{{route('admin.campaign-banners.delete')}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{$campaignBanner->id}}">
                                            <button type="submit" class="btn btn-danger" href="#" title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
