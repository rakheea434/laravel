@extends('dashboard.layouts.app')

@section('title', 'Blog')

@section('content')

<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">Blogs</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all the blogs.</p>
      </div>
      <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <a href="{{ route( 'admin.blog.create' )}}" type="button" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Blog</a>
      </div>
    </div>
    <div class="mt-8 flow-root">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <table class="min-w-full divide-y divide-gray-300">
            <thead>
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                  <a href="#" class="group inline-flex">
                    Title
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                  <a href="#" class="group inline-flex">
                    Description 
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                  <a href="#" class="group inline-flex">
                    Image 
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th> 
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                  <a href="#" class="group inline-flex">
                    Action 
                    <span class="invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible">
                      <svg class="invisible ml-2 h-5 w-5 flex-none rounded text-gray-400 group-hover:visible group-focus:visible" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                      </svg>
                    </span>
                  </a>
                </th> 
                 
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach ($blogs as $key=>$blog)
              <tr>
                 <td class="whitespace-wrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $blog->title }}</td>
                 <td class="whitespace-wrap px-3 py-4 text-sm text-gray-500">
                    @excerpt($blog->description)
                </td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                    <img src="{{$blog->image}}" alt="{{$blog->title}}" class="w-48 h-auto" >
                </td>
                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 flex gap-5 items-center text-sm sm:pr-0">
                    @can('isAdmin')

                  <a href="{{route('admin.blog.edit', $blog->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                    <form  method="post" action="{{route('admin.blog.destroy', $blog->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-indigo-900">Delete</button>
                    </form>
                    @endcan
                </td>
              </tr>
 

              @endforeach
            </tbody>
            
            <tfoot>
                <tr>
                    <td colspan="5" class="p-5">
                        {{ $blogs->links() }}
                    </td>
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  

@endsection
