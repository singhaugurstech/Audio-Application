@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('user/index.user')}}</h1>
            <a class="badge bg-danger text-white ms-2"  href="#">
               {{__('user/index.add_button')}}
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
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{__('user/index.seriol')}}</th>
                        <th>{{__('user/index.user_name')}}</th>
                        <th>{{__('user/index.email')}}</th>
                        <th>{{__('user/index.password')}}</th>
                        <th>{{__('user/index.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @foreach($users as $user)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>XXXXXXXXX</td>
                        <td>
                            <button class="btn btn-info edit"><a href="#"><i class='far fa-edit edit'></i></a></button>
                            <button class="btn btn-danger delete"><a href="#"><i class='fas fa-trash-alt delete'></i></a></button>
                        </td>
                    </tr>
                @endforeach
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