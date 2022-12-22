@extends('layouts.layout')

@section('content')

<div class="py-4 px-4">
    <h2 class="text-lg font-semibold text-black-800">Task details</h2>
    <p class="py-2 text-lg text-black-700">Task_id: {{ $task->id }}</p>
    <p class="py-2 text-lg text-black-700">De task: {{ $task->text }}</p>
    <p class="py-2 text-lg text-black-700">Begindatum: {{ $task->startdate }}</p>
    <p class="py-2 text-lg text-black-700">Einddatum: {{ $task->enddate }}</p>
    <p class="py-2 text-lg text-black-700">De User: {{ $task->user->name }}</p>
    <p class="py-2 text-lg text-black-700">De project: {{ $task->project->name }}</p>
    <p class="py-2 text-lg text-black-700">De activity status: {{ $task->activity->name }}</p>
    <p class="py-2 text-lg text-black-700">Datum van het aanmaken van de task: {{ $task->startdate }}</p>

</div>
@endsection