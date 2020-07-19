@extends('layouts.app')

@section('title')
Bandingin | Edit Book
@endsection

@section('content')
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-info">
    {{Session::get('success')}}
</div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('books.update', [$book->id])}}"
    method="POST">
    <h2 class="mb-5">New Book</h2>

    @csrf

    <input type="hidden" value="PUT" name="_method">

    <input type="text" class="form-control" name="bookName" value="{{ $book->bookName }}" placeholder="Book Name">
    <br>

    <button class="form-control btn badge-info">
        <span class="fas fa-fw fa-edit" aria-hidden="true"></span>
        <span><strong>Update Book</strong></span>
    </button>
</form>
@endsection
