@extends('layouts.app')

@section('title')
Bandingin | Create new Library
@endsection

@section('content')
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('libraries.store')}}" method="POST">
    <h2 class="mb-5">New Library</h2>

    @csrf
    <input type="text" class="form-control" name="libraryName" placeholder="Library Name">
    <br>

    <label for="" class="h4 font-weight-bold">Books</label>
    <br>
    <div class="row">
        @foreach($book as $books)
        <div class="col-3">

            <label for="{{ substr(Str::slug($books->bookName, '-'), 0, 3) . $books->id }}">
                <input type="checkbox" name="books_id[]"
                    id="{{ substr(Str::slug($books->bookName, '-'), 0, 3) . $books->id }}"
                    value="{{ Str::slug($books->bookName, '-') }}">
                {{ $books->bookName }}</label>
        </div>
        @endforeach
    </div>
    <br>

    <button class="form-control btn badge-primary">
        <span class="fas fa-fw fa-plus" aria-hidden="true"></span>
        <span><strong>Create New Library</strong></span>
    </button>
</form>
@endsection
