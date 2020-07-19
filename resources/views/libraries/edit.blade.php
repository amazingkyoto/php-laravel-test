@extends('layouts.app')

@section('title')
Bandingin | Edit Library
@endsection

@section('content')
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-info">
    {{Session::get('success')}}
</div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
    action="{{route('libraries.update', [$library->id])}}" method="POST">
    <h2 class="mb-5">New Library</h2>

    @csrf

    <input type="hidden" value="PUT" name="_method">

    <input type="text" class="form-control" name="libraryName" value="{{ $library->libraryName }}"
        placeholder="Library Name">
    <br>

    <label for="" class="h4 font-weight-bold">Books</label>
    <br>
    <div class="row">
        <?php
            if ($library->books_id != NULL) {
                $books_id = explode(',', $library->books_id);
            }

            // if (isset($books_id)) {
            //     foreach ($books_id as $booksid) {
            //         if
            //     }
            // }
        ?>

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

    <button class="form-control btn badge-info">
        <span class="fas fa-fw fa-edit" aria-hidden="true"></span>
        <span><strong>Update Library</strong></span>
    </button>
</form>
@endsection
