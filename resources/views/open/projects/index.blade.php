@extends('layouts.layout')
@section('content')
  
<div class="mx-auto container py-8">
  <div class="flex flex-wrap items-center lg:justify justify-center">
    @foreach($projects as $project)
    <div tabindex="0" class="focus:outline-none mx-2 w72 xl:mb-0 mb-8">
      <div class="bg-gray-100 rounded-lg m-4">
        <div class="p-4">
           <img class="h-40 rounded w-full object-cover mb-6" scr="#" >
          <div class="flex item-center">
            <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{ $project->none }}</h2>
          </div> 
          <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">een Beschrijving.....</p> 
        </div>
      </div> 
    </div>
    @endforeach
  </div>
  {{ $projects->links() }}
</div>
@endsection
