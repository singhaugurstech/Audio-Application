@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add User</h1>
            <a class="badge bg-danger text-white ms-2"  href="#">
               Click here to add User
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
                        <th>Seriol</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
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