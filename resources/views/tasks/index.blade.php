@extends('layouts.app')
@section('content')
<div class="card-body container">
    <div class="card-body">
        <form class="form-inline" action="{{ route('tasks.index') }}" method="GET">
            <select name="status_id" id="" class="form-control">
                <option value="" selected disabled>Choose task status to filter:</option>
                @foreach ($statuses as $status)
                <option value="{{ $status->id }}" 
                    @if($status->id == app('request')->input('status_id')) 
                        selected="selected" 
                    @endif>{{ $status->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-success" href={{ route('tasks.index') }}>Show all</a>
        </form>
    </div>
<div class="card-body">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Task description</th>
            <th>Status ID and name</th>
            <th>Date added</th>
            <th>Date finished</th>
            <th>Actions</th>
        </tr>
        @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->task_name }}</td>
            <td>{!! $task->task_description !!}</td>
            <td>{{ $task->Status->id . ". " }}  {{ $task->Status->name }}</td>
            <td>{{ $task->created_at }}</td>
            <?php 
            if  ($task->Status->name == "Finished")
            $finished_at = " $task->updated_at ";
            else {
                $finished_at = " ";
            }
            ?>
            <td>{{ $finished_at }}</td>
            <td>
                <form action={{ route('tasks.destroy', $task->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('tasks.edit', $task->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection
 