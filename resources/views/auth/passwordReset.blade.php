@extends('dashboard.layouts.app')

@section('title', 'Page Title')

@section('content')
<section class=" h-full grid justify-center"> 
    <form class="w-[400px] mt-5" method="POST" action="{{ route('admin.password.reset.process') }}">
        @csrf
        <div class="space-y-12">
           @include('errors.message')
         
          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Password Reset</h2>
       
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="col-span-full">
                <label for="old_password" class="block text-sm font-medium leading-6 text-gray-900">Old Password</label>
                <div class="mt-2">
                  <input type="password" name="old_password" id="old_password" autocomplete="old_password" class="block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2 @error('paswword') border-red-500 border-2 @enderror">
                  @error('old_password')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-span-full">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">New Password</label>
                <div class="mt-2">
                  <input type="password" name="password" id="password" autocomplete="password" class="block w-full rounded-md  py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2 @error('paswword') border-red-500 border-2 @enderror">
                  @error('password')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-span-full">
                <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
                <div class="mt-2">
                  <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" class="block w-full rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2 @error('password_confirmation') border-red-500 border-2 @enderror">
                  @error('password_confirmation')
                  <div class="text-sm text-red-600">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="mt-6 flex items-center justify-end gap-x-6"> 
          <button type="submit" class="rounded-md bg-indigo-600 px-10 py-3 text-2xl font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Reset Password</button>
        </div>
      </form>
</section>
@endsection

@section('script')

@endsection