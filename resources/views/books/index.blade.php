@extends('layouts.app')

@section('title')
Bandingin | Books
@endsection

@section('content')
<br><br>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('books.index')}}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filter by book name" name="n"
                            value="<?= isset($_GET['n']) ? $_GET['n'] : '' ?>">
                        <div class="input-group-append">
                            <input type="submit" value="Filter" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="my-3">
        <a href="{{ route('books.create') }}" class="form-control btn badge-primary">
            <span class="fas fa-fw fa-plus" aria-hidden="true"></span>
            <span><strong>Add New Book</strong></span>
        </a>
        <hr class="my-3">
        <table class="table table-bordered table-stripped">
            <thead>
                <tr class="text-center">
                    <th><b>Name</b></th>
                    <th><b>Actions</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($book as $books)
                <tr>
                    <td>{{$books->bookName}}</td>
                    <td class="text-center">
                        <a href="{{route('books.edit', [$books->id])}}" class="btn btn-info btn-sm"><i
                                class="fas fa-fw fa-edit"></i> Edit </a>
                        <button class="btn btn-danger btn-sm"
                            onclick="deleteswal('{{ route('books.delete', [$books->id]) }}')"><i
                                class="fas fa-fw fa-trash"></i>
                            Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colSpan="10">
                        {{$book->appends(Request::all())->links()}}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
