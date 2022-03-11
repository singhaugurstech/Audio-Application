@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('about/create.about')}}</h1>
            <a class="badge bg-danger text-white ms-2"  href="{{ url('about')}}">
                {{__('about/create.add_button')}}

            </a>
        </div>
        <form action="{{ url('about/store')}}" method="post" enctype="multipart/form-data">
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
                    <h5 class="card-title mb-0">{{__('about/create.title')}}</h5>
				</div>
                <div class="card-body">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{__('about/create.enter_title')}}" value="{{old('title')}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-8">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('about/create.description')}}</h5>
				</div>
                <div class="card-body">
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{__('about/create.enter_description')}}" value="{{old('description')}}"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-12">
               <div class="card-body">
                 <button type="submit" class="btn btn-info">{{__('about/create.about')}}</button>
               </div>
            </div>
        </form>
        </div>
        </div>
</main>
@endsection
   