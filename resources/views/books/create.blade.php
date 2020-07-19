@extends('layouts.app')

@section('title')
Bandingin | Create new Book
@endsection

@section('content')
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('books.store')}}" method="POST">
    <h2 class="mb-5">New Book</h2>

    @csrf
    <input type="text" class="form-control" name="bookName" placeholder="Book Name">
    <br>

    <button class="form-control btn badge-primary">
        <span class="fas fa-fw fa-plus" aria-hidden="true"></span>
        <span><strong>Create New Book</strong></span>
    </button>
</form>
@endsection
