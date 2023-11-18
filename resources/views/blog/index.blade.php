@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

@include('layouts.header', ['title' => 'Blog Page', 'subTitle' => 'Lorem Ipsum Dolor Sit Amet'])

<div class="container mx-auto flex flex-wrap py-6">
    <!-- Posts Section -->
    <section class="w-full md:w-2/3 flex flex-col items-center px-3 ">
        @foreach ($blogs as $blog)  
        <article class="flex flex-col shadow my-4 w-full">
            <!-- Article Image -->
            <a href="{{route('blog.show', $blog->slug)}}" class="hover:opacity-75">
                <img class="w-full h-auto" src="{{$blog->image}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Category</a>
                <a href="{{route('blog.show', $blog->slug)}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$blog->title}}</a>
                <p href="#" class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">{{$blog->user?->name}}</a>, Published on 
                    {{$blog->created_at->diffForHumans()}}
                </p>
                <p class="pb-6">
                    @excerpt($blog->description)
                </p>
                <a href="{{route('blog.show', $blog->slug)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article> 
        @endforeach

        <div class=" grid grid-cols-1 w-full items-center py-8"> 
            {{$blogs->links()}}
        </div>

    </section>

    <!-- Sidebar Section -->
    <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p class="text-xl font-semibold pb-5">About Us</p>
            <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
            <a href="{{route('about')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                Get to know us
            </a>
        </div>

        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
             
        </div>

    </aside>

</div>

@endsection