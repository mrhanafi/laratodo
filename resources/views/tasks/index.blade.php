@extends('layouts.app')

@section('content')
<h1>Hello Task App</h1>

//display/render all of the tasks that we have

@foreach($tasks as $task)
<div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
    <div class="card-body">
        
    <p>
        {{ $task->description }}
    </p>
    @if(!$task->isCompleted())
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PATCH')
            
                <button class="btn btn-secondary" input="submit">Complete</a>
           
            
        </form>
        @else
        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('DELETE')
                <button class="btn btn-danger" input="submit">Delete</a>
        </form>
        @endif
    </div>
  </div>
@endforeach
<a href="/tasks/create" class="btn btn-primary btn-lg">New Task</a>
@endsection
