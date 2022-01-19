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
                                <h4 class="card-title mb-1">Add New Category</h4>
                            </div>
                            <div class="card-body pt-0">
                                <form class="form-horizontal" method="post" action="{{route('admin.articles.store')}}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                    <input type="text" class="form-control" name="title" placeholder="Article Title">
                                        @error('title')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                    <input type="text" class="form-control" name="tags" placeholder="Tag Name">
                                        @error('title')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                    <select name="category_id">
                                        <option >Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('category_id')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" cols="30" rows="10" placeholder="Article Body"></textarea>
                                        @error('body')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-0 mt-3 justify-content-end">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
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
