@extends('layouts.app')
@section('content')
@include('sidebar')
            <main class="content">
				<div class="container-fluid p-0">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">{{__('user/profile.profile')}}</h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">{{__('user/profile.profile_details')}}</h5>
								</div>
								<div class="card-body text-center">
									@if($user->profile_image != '')
									  <img src='<?php echo asset("document/user/{$user->profile_image}"); ?>' alt="user" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									@else
									   <img src="img/avatars/admin.png" alt="user" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									@endif
									<h5 class="card-title mb-0">{{$user->name}}</h5>
									<div class="text-muted mb-2">{{$user->profession}}</div>
									<div>
										<a class="btn btn-primary btn-sm" href="#">Follow</a>
										<a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
						   @if ($message = Session::get('success'))
								<div class="alert alert-success alert-block">
									<!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
										<strong>{{ $message }}</strong>
								</div>
							@endif
							@if ($message = Session::get('error'))
								<div class="alert alert-danger alert-block">
									<!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
										<strong>{{ $message }}</strong>
								</div>
							@endif
							<div class="card">
								<form action="{{url('edit_profile')}}" method="post" enctype="multipart/form-data">
									@csrf
								<div class="card-header">
									<h5 class="card-title mb-0">{{__('user/profile.your_profile')}}</h5>
								</div>
								<div class="card-body h-100">
									<div class="col-sm-6">
										<lable>{{__('user/profile.your_name')}}</lable><br>
										<input type="text" name="name" class="form-control" value="{{$user->name}}" required>
											@error('name')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
                                    </div>
									<hr />
									<div class="col-sm-6">
										<lable>{{__('user/profile.your_email')}}</lable><br>
										<input type="text" name="email" class="form-control" value="{{$user->email}}" required>
										    @error('email')
												<div class="alert alert-danger">{{ $message }}</div>
											@enderror
                                    </div>
									<hr/>
									<div class="col-sm-6">
										<lable>{{__('user/profile.enter_current_password')}}</lable><br>
										<input type="text" name="current_password" class="form-control" placeholder="{{__('user/profile.enter_current_password')}}">
                                    </div>
									<hr/>
									<div class="col-sm-6">
										<lable>{{__('user/profile.change_password')}}</lable><br>
										<input type="text" name="change_password" class="form-control" placeholder="{{__('user/profile.change_password')}}">
                                    </div>
									<hr/>
									<div class="col-sm-6">
										<lable>{{__('user/profile.your_profession')}}</lable><br>
										<input type="text" name="profession" class="form-control" value="{{$user->profession}}" placeholder="{{__('user/profile.enter_profession')}}">
                                    </div>
									<hr/>
									<div class="col-sm-6">
										<lable>{{__('user/profile.language')}}</lable><br>
										<select type="text" name="language" class="form-control">
											@foreach($languages as $language)
											<option value="{{ $language->slug }}" {{ ( $user->language == $language->slug) ? 'selected' : '' }}>{{$language->name}}</option>
											@endforeach
                                        </select>
                                    </div>
									<hr/>
									<div class="col-sm-6">
										<lable>{{__('user/profile.profile_image')}}</lable><br>
										<input type="file" name="image" class="form-control" value="{{$user->image}}">
                                    </div>
									<hr/>
									<div class="d-grid">
										<button type="submit" class="btn btn-primary">{{__('user/profile.edit_profile')}}</button>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
@endsection