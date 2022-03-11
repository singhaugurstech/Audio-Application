@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('category/index.category')}}</h1>
            <a class="btn btn-info text-white ms-2"  href="{{ url('category/create')}}">
               {{__('category/index.add_button')}}
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
                        <th>{{__('category/index.seriol')}}</th>
                        <th>{{__('category/index.name')}}</th>
                        <th>{{__('category/index.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp;
                @if (count($categoryes) > 0) 
                    @foreach($categoryes as $category)
                        <tr>
                            <td>{{$i++}}.</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <button class="btn btn-info edit"><a href="category/edit/<?php echo $category->id; ?>"><i class='far fa-edit edit'></i></a></button>
                                <button class="btn btn-danger delete"><a href="category/destroy/<?php echo $category->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class='fas fa-trash-alt delete'></i></a></button>
                            </td>
                        </tr>
                    @endforeach
                @else
                         <tr>
                            <td colspan="3"><center><b>{{__('category/index.no_data')}}</b></center></td>
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