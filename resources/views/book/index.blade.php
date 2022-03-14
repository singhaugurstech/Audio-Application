@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('book/index.book')}}</h1>
            <a class="btn btn-success text-white ms-2"  href="{{ url('book/create')}}">
               {{__('book/index.add_button')}}
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
                        <th>{{__('book/index.seriol')}}</th>
                        <th>{{__('book/index.title')}}</th>
                        <th>{{__('book/index.author')}}</th>
                        <th>{{__('book/index.category')}}</th>
                        <th>{{__('book/index.book_summary')}}</th>
                        <th>{{__('book/index.book_description')}}</th>
                        <th>{{__('book/index.cover_page')}}</th>
                        <th>{{__('book/index.document')}}</th>
                        <th>{{__('book/index.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @if (count($books) > 0) 
                    @foreach($books as $book)
                        <tr>
                            <td>{{$i++}}.</td>
                            <td>{{$book->title}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->category_id->name}}</td>
                            <td>{{$book->summary}}</td>
                            <td>{{$book->description}}</td>
                            <td><img src='<?php echo asset("document/book_cover/{$book->cover_page}"); ?>' height="50px" width="100px"></td>
                            <td><img src='<?php echo asset("document/books/{$book->file}"); ?>' height="50px" width="100px"></td>
                            <td>
                                <button class="btn btn-info edit"><a href="book/edit/<?php echo $book->id; ?>"><i class='far fa-edit edit'></i></a></button>
                                <button class="btn btn-danger delete"><a href="book/destroy/<?php echo $book->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class='fas fa-trash-alt delete'></i></a></button>
                            </td>
                        </tr>
                    @endforeach
                    @else
                         <tr>
                            <td colspan="9"><center><b>{{__('book/index.no_data')}}</b></center></td>
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