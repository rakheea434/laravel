@extends('dashboard.layouts.app')

@section('title', 'Page Title')

@section('content')
<div class="w-full p-10">
   @php
       $settings = getAllSettings();
   @endphp

   @foreach ($settings as $key=>$value)
       <div class="grid grid-cols-5 gap-10">
            <span class=" col-span-1   font-bold">{{$key}}:</span>
            <span class=" col-span-4">@excerpt($value)</span>
        </div>
   @endforeach
    
</div>
   
@endsection