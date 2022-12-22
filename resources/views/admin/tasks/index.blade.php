@extends('layouts.layout')
@section('topmenu_items')
    <!-- top Navbar -->
    <nav class="flex flex-row justify-between border-b dark:border-gray-100 dark:text-gray-100 
        transition duration-100 ease-in-out">
    <a href="{{ route('tasks.index') }}">
        <button class="py-2 block border-b-2 border-transparent
        focus:outline-none font-medium capitalize text-center
        focus:text-green-500 focus:border-green-500
        dark-focus:text-green-200 dark focus:border-green-200
        transition duration-500 ease-in-out">
        Index

        </button>
        <a href="{{ route('tasks.create')}}"
        class="ml-2 py-2 block text-green-500 border-green-500
         dark:text-green-200 dark:border-green-200 focus:outline-none border-b-2 font-medium capitalize 
         transition duration-500 ease-in-out">
         Create
        </a>

        </nav>
        @endsection
        @section('content')
        
        <div class="container mx-1">
            <div class="ml-2 flex flex-col">
                <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                    Task Admin
                </h2>
            </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow p-6 pr-10 mb-8"
                style="...">
                {{session('status')}}
            </div>
        @endif

        <table class="min-w-full">
        <thead class="border-b">
            <tr>
                <td>#</td>
                <td>De taak</td>
                <td>Startdatum</td>
                <td>Einddatum</td>
                <td>Naam van gebruiker</td>
                <td>Projectnaam</td>
                <td>Naam van de activity</td>
            </tr>
        </thead> 
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($tasks as $task)
            <thead></thead>
            <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->name }}
                </td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->startdate }}
                </td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->enddate }}
                 </td> 
                 <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->user->name }}
                </td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->project->name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$task->activity->name }}
                </td> 
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                    Details
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                    Edit
                    </a>
                </td>
                @can('delete project')
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <a href="{{ route('tasks.delete', ['task' => $task->id]) }}">
                    Delete
                    </a>
                </td>
               @endcan
            </tr>
            @endforeach
        </tbody>  
        </table>
        
</div>


@endsection