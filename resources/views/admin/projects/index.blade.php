@extends('layouts.layout')

@section('content')

    <div class="container mx-1">
        <div class="ml-2 flex flex-col">
            <h2 class="my-4 text-4xl font-semibold text-gray-600 dark:text-gray-400">
                Project Admin
            </h2>
        </div>

        @if(session('status'))
            <div class="bg-green-200 text-green-900 rounded-lg shadow-ml p-6 pr-10 mb-8"
                style="...">
                {{ session('status') }}
            </div>
        @endif

        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal rounded-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">id</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Details</th>
                        <th class="py-3 px-6 text-center">Edit</th>
                        @can('delete project')
                        <th class="py-3 px-6 text-center">Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                @foreach($projects as $project)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span>{{ $project->id }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex items-center">
                            <span>{{ $project->name }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center">
                            <a href="{{ route('projects.show', ['project' => $project->id]) }}">
                            <span>Details</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                            <a href="{{ route('projects.edit', ['project' => $project->id]) }}">
                            <span>Edit</span>
                        </div>
                    </td>
                    @can('delete project')
                    <td class="py-3 px-6 text-center">
                        <div class="flex items-center justify-center">
                        <a href="{{ route('projects.delete', ['project' => $project->id]) }}">
                            <span>Delete</span>
                        </div>
                    </td>
                    @endcan
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection