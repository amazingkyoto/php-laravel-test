@extends('layouts.app')

@section('title')
Bandingin | Dashboard Admin
@endsection

@section('content')

@foreach($menu as $menus)
<h2 class="mt-5"><span class="fas fa-fw fa-thumb-tack"></span>{{ $menus->title }}</h2>
<a href="{{url('') . '/' . $menus->url}}" class="btn badge-primary mb-3">
    <span class="{{ $menus->iconClass }}" aria-hidden="true"></span>
    <span><strong>{{ $menus->title }}</strong></span>
</a>
@endforeach

@endsection
