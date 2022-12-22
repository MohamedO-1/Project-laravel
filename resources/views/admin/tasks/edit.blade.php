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
            action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Text
                </label>    
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    name="text"
                    id="text"
                    type="text"
                    value="{{ old('text', $task->name) }}"
                    required>
                <label class="block text-gray-700 text-sm font-bold mb-2 pt-4" for="description">
                   
                </label>    
                <label class="block text-gray-700 text-sm font-bold mb-2 pt-4" for="startdate">
                    startdate
                </label>    
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('startdate') border-red-500 @enderror"
                    name="startDatum"
                    id="startDatum"
                    type="date"
                    value="{{ old('date')}}"
                required>
                <label class="block text-gray-700 text-sm font-bold mb-2 pt-4" for="enddate">
                    enddate
                </label>    
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('enddate') border-red-500 @enderror"
                    name="endDatum"
                    id="endDatum"
                    type="date"
                    value="{{ old('date')}}"
                required>
                <label class="block text-sm">
                   <span class="text-gray-700">User_id</span> 
                   <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                   focus:outline-none focus:shadow-outline" name="user_id" id="user_id">
                   @foreach ($users as $user)
                        <option value="{{ $user->id }}" 
                        @selected($user->id == old('user_id', $task->user_id))>{{ $user->name }}</option>
                    @endforeach
                </select>
            </label>   
            </div>
            <div class="flex items-center justify-between"> 
                <button id="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Wijzigen
                </button>
            </div>
        </form>

</div>

@endsection