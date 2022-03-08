@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add Books</h1>
            <a class="badge bg-danger text-white ms-2"  href="{{ url('category/create')}}">
               Click here to add Category 
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
                        <th>Seriol</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @foreach($categoryes as $category)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <button class="btn btn-info edit"><a href="category/edit/<?php echo $category->id; ?>"><i class='far fa-edit edit'></i></a></button>
                            <button class="btn btn-danger delete"><a href="category/destroy/<?php echo $category->id; ?>"><i class='fas fa-trash-alt delete'></i></a></button>
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