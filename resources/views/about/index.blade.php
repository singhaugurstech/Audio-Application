@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('about/index.about')}}</h1>
            <a class="btn btn-danger text-white ms-2"  href="{{ url('about/create')}}">
                {{__('about/index.add_button')}}
            </a>
        </div>
        <div class="card">
            <div class="col-sm-12">
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
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{__('about/index.seriol')}}</th>
                        <th>{{__('about/index.title')}}</th>
                        <th>{{__('about/index.description')}}</th>
                        <th>{{__('about/index.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @if (count($abouts) > 0) 
                @foreach($abouts as $about)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$about->title}}</td>
                        <td>{{$about->description}}</td>
                        <td>
                            <button class="btn btn-info edit"><a href="about/edit/<?php echo $about->id; ?>"><i class='far fa-edit edit'></i></a></button>
                            <button class="btn btn-danger delete"><a href="about/destroy/<?php echo $about->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class='fas fa-trash-alt delete'></i></a></button>
                        </td>
                    </tr>
                @endforeach

                @else
                        <tr>
                            <td colspan="4"><center><b>{{__('about/index.no_data')}}</b></center></td>
                        </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
</main>
<style>
    .edit{
        color:white
    }
    .delete{
        color:white
    }
</style>
@endsection