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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mg-b-0">CATEGORIES TABLE</h4>
                                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                                </div>
                                <br>
                                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Create New User</a>
                                <br>
                                <p class="tx-12 tx-gray-500 mb-2"></p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mg-b-0 text-md-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Job Title</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <th>{{++$key}}</th>
                                            <td>{{$user->name}}</td>
                                            <td><img src="{{asset($user->image)}}" width="100px" height="80px" alt="Image"></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->jobTitle()}}</td>
                                            <td>
                                                @if($user->active == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">In Active</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->active == 1)
                                                    <a href="{{route('admin.users.deactivate',$user->id)}}" class="btn btn-dark" title="Activate"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                                @else
                                                    <a href="{{route('admin.users.activate',$user->id)}}" class="btn btn-info" title="Deactivate"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                @endif
                                                <a class="btn btn-primary" href="{{route('admin.users.show',[$user->id])}}" title="View"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-success" href="{{route('admin.users.edit',[$user->id])}}" title="Edit"><i class="fa fa-edit"></i></a>
                                                <form action="{{route('admin.users.delete')}}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$user->id}}">
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
                    <!--/div-->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
