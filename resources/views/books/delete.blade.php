@extends('layouts.app')

@section('title')
Bandingin | Delete Library
@endsection

@section('content')
<br>
<br>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" method="POST">
    <h2 class="mb-5">Delete Library</h2>

    @csrf

    <input type="hidden" value="DELETE" name="_method">

    <input type="text" class="form-control" name="libraryName" value="{{ $library->libraryName }}"
        placeholder="Library Name" disabled>
    <br>

    <button class="form-control btn badge-danger" name="archive" type="submit"
        onclick="deleteswal('{{ route('libraries.delete', [$libraries->id]) }}')">
        <span class="fas fa-fw fa-trash" aria-hidden="true"></span>
        <span><strong>Delete Library</strong></span>
    </button>
</form>
@endsection
