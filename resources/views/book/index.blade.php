@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Add Books</h1>
            <a class="badge bg-danger text-white ms-2"  href="{{ url('book/create')}}">
               Click here to add Book
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
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Book Summary</th>
                        <th>Book Description</th>
                        <th>Cover Page</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @foreach($books as $book)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td>{{$book->category_id->name}}</td>
                        <td>{{$book->summary}}</td>
                        <td>{{$book->description}}</td>
                        <td><img src='<?php echo asset("document/books/{$book->cover_page}"); ?>' height="50px" width="100px"></td>
                        <td><img src='<?php echo asset("document/books/{$book->file}"); ?>' height="50px" width="100px"></td>
                        <td>
                            <button class="btn btn-info edit"><a href="book/edit/<?php echo $book->id; ?>"><i class='far fa-edit edit'></i></a></button>
                            <button class="btn btn-danger delete"><a href="book/destroy/<?php echo $book->id; ?>"><i class='fas fa-trash-alt delete'></i></a></button>
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