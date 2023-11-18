@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<div class="text-blue-500"> 
    {{$blog->title}}
</div>

@endsection