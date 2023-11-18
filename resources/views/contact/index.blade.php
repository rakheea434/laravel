@extends('layouts.app')

@section('title', 'Page Title')

@section('content') 

@include('layouts.header', ['title' => 'Contact Page', 'subTitle' => 'Lorem Ipsum Dolor Sit Amet'])

<div class="w-full grid grid-cols-2 gap-10 flex-wrap p-10">
    <div class="col-span-1">
        <h1 class=" text-4xl underline underline-offset-8 pb-5">Contact us</h1>
        @include('errors.message')

        <div class="p-2">
            <form class=" mx-auto mt-10" method="POST" action="{{ route('contact.store') }}">
                @csrf
                @method('POST')
                <div class="space-y-12"> 
        
                  <div class="border-b border-gray-900/10 pb-12">
                
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                      <div class="col-span-6">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900"> Name</label>
                        <div class="mt-2">
                          <input type="text" name="name" id="name" 
                          autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           >
                           @error('name')
                           <div class="text-sm text-red-600">{{ $message }}</div>
                           @enderror
                        </div>
                      </div> 
                      <div class="col-span-6">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900"> Email</label>
                        <div class="mt-2">
                          <input type="text" name="email" id="email" 
                          autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           >
                           @error('email')
                           <div class="text-sm text-red-600">{{ $message }}</div>
                           @enderror
                        </div>
                      </div> 
                      <div class="col-span-6">
                        <label for="phone" class="block text-sm font-medium leading-6 text-gray-900"> Phone</label>
                        <div class="mt-2">
                          <input type="text" name="phone" id="phone" 
                          autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           >
                           @error('phone')
                           <div class="text-sm text-red-600">{{ $message }}</div>
                           @enderror
                        </div>
                      </div> 
                      <div class="col-span-6">
                        <label for="subject" class="block text-sm font-medium leading-6 text-gray-900"> Subject</label>
                        <div class="mt-2">
                          <input type="text" name="subject" id="subject" 
                          autocomplete="given-name" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                           >
                           @error('subject')
                           <div class="text-sm text-red-600">{{ $message }}</div>
                           @enderror
                        </div>
                      </div> 
              
                      <div class="col-span-6">
                        <label for="message" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea name="message" id="message" cols="10" rows="5" class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea> 
                            @error('message')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>   
        
                    </div>
                  </div>
                </div>
              
                <div class="mt-6 flex items-center justify-end gap-x-6"> 
                  <button type="submit" class="rounded-md bg-indigo-600 px-10 py-3 text-2xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Send</button>
                </div>
              </form>
        </div>
    </div>
    <div class=" col-span-1" >
        <iframe class="my-20 grid place-items-center h-full py-10"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.95338886736!2d90.41968899999999!3d23.7808405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1696435504947!5m2!1sen!2sbd"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

@endsection
