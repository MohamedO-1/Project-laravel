@extends('layouts.layout')

@section('content')

<div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                Project Admin
            </h2>
        </div>
    
    <div class="max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <img class="w-50 h-25 object-cover object-center" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" alt="avatar">
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <h1 class="mx-3 text-white font-semibold text-lg">ID: {{ $project->id }}</h1>
            <h1 class="mx-3 text-white font-semibold text-lg">Project</h1>

        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">{{ $project->name }}</h1>
            <p class="py-2 text-lg text-gray-700">{{ $project->description }}</p>
        </div>
        <div class="flex items-center px-6 py-3 bg-gray-900">
            <p class="mx-3 text-white font-semibold text-lg">Created at: {{ $project->created_at }}</p>
        </div>
    </div>
    
@endsection