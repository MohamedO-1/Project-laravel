@extends('layouts.layout')

@section('content')

<div class="container mx-1">
    <div class="ml-2 flex flex-col">
        <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
            Project Admin
        </h2>
    </div>

    @if($errors->any())
        <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8"
            style="...">
            <ul class="mt-3 list-disc list-inside text-sn terxt-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form id="form" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
            action="{{ route('projects.store') }}" method="POST">
        @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>    
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    name="name"
                    id="name"
                    type="text"
                    value="{{ old('name')}}"
                    required>
                <label class="block text-gray-700 text-sm font-bold mb-2 pt-4" for="description">
                    description
                </label>    
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-500 @enderror"
                    name="description"
                    id="description"
                    type="text"
                    value="{{ old('description')}}"
                    required>
            </div>
            <div class="flex items-center justify-between"> 
                <button id="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Submit
                </button>
            </div>
        </form>

</div>

@endsection