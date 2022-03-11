@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('advertisement/index.advertisement')}}</h1>
            <a class="btn btn-danger text-white ms-2"  href="{{ url('advertisement/create')}}">
                {{__('advertisement/index.add_button')}}
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
                        <th>{{__('advertisement/index.seriol')}}</th>
                        <th>{{__('advertisement/index.title')}}</th>
                        <th>{{__('advertisement/index.description')}}</th>
                        <th>{{__('advertisement/index.valid_time')}}</th>
                        <th>{{__('advertisement/index.image')}}</th>
                        <th>{{__('advertisement/index.action')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php $i = 1 @endphp; 
                @if (count($advertisements) > 0) 
                @foreach($advertisements as $advertisement)
                    <tr>
                        <td>{{$i++}}.</td>
                        <td>{{$advertisement->name}}</td>
                        <td>{{$advertisement->description}}</td>
                        <td>{{$advertisement->valid_time}}</td>
                        <td><img src='<?php echo asset("document/advertisement/{$advertisement->image}"); ?>' height="50px" width="100px"></td>
                        <td>
                            <button class="btn btn-info edit"><a href="advertisement/edit/<?php echo $advertisement->id; ?>"><i class='far fa-edit edit'></i></a></button>
                            <button class="btn btn-danger delete"><a href="advertisement/destroy/<?php echo $advertisement->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><i class='fas fa-trash-alt delete'></i></a></button>
                        </td>
                    </tr>
                @endforeach

                @else
                        <tr>
                            <td colspan="6"><center><b>{{__('advertisement/index.no_data')}}</b></center></td>
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