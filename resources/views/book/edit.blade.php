@extends('layouts.app')
@section('content')
@include('sidebar')
<main class="content">
   <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">{{__('book/create.add_book')}}</h1>
            <a class="badge bg-danger text-white ms-2" href="{{ url('books')}}">
             {{__('book/create.add_button_view')}}
            </a>
        </div>
        <form action="{{ url('book/update')}}" method="post" enctype="multipart/form-data">
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
                    <h5 class="card-title mb-0">{{__('book/create.title')}}</h5>
				</div>
                <div class="card-body">
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$book->title}}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.author')}}</h5>
				</div>
                <div class="card-body">
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{$book->author}}">
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.upload_audio')}}</h5>
				</div>
                <div class="card-body">
                    <input type="file" name="document" class="form-control @error('document') is-invalid @enderror" value="{{$book->file}}" placeholder="Enter Auther Name">
                    @error('document')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.category')}}</h5>
				</div>
                <div class="card-body">
                    <select type="text" name="category" class="form-control @error('category') is-invalid @enderror">
                        @foreach($categoryes as $category)
                         <option value="{{ $category->id }}" {{ ( $category->id == $book->category_id) ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.cover_page')}}</h5>
				</div>
                <div class="card-body">
                    <input type="file" name="cover_page" class="form-control @error('cover_page') is-invalid @enderror" value="{{$book->cover_page}}">
                    @error('cover_page')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div> 
            <div class="col-12 col-lg-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.book_summary')}}</h5>
				</div>
                <div class="card-body">
                    <textarea type="text" name="summary" class="form-control @error('summary') is-invalid @enderror" placeholder="Enter Book Summary">{{$book->summary}}</textarea>
                    @error('summary')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>  
            <div class="col-12 col-lg-6">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{__('book/create.book_description')}}</h5>
				</div>
                <div class="card-body">
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Book Description">{{$book->description}}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>   
            <div class="col-12 col-lg-12">
               <div class="card-body">
                   <input type="hidden" name="edit_id" value="{{$book->id}}">
                 <button type="submit" class="btn btn-info">{{__('book/create.add_book')}}</button>
               </div>
            </div>
        </form>
        </div>
        </div>
</main>
@endsection
   