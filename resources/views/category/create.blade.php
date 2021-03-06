@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('category/create.category')}}</h1>
            <a class="badge bg-danger text-white ms-2"  href="{{ url('category')}}">
              {{__('category/create.add_button')}}
            </a>
        </div>
        <form action="{{ url('category/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                    <strong>{{ $message }}</strong>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('category/create.name')}}</h5>
				</div>
                <div class="card-body">
                    <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" placeholder="{{__('category/create.enter_name')}}" value="{{old('category')}}">
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-12">
               <div class="card-body">
                 <button type="submit" class="btn btn-info">{{__('category/create.category')}}</button>
               </div>
            </div>
        </form>
        </div>
        </div>
</main>
@endsection
   