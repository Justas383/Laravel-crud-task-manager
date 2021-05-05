@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Updating task info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                        <label for="">Name: </label>
                        <input type="text" name="task_name" class="form-control" value="{{ $task->task_name }}">
                        @error('task_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status: </label>
                        <select name="status_id" id="" class="form-control">
                             <option value="" selected disabled>Choose task status</option>
                             @foreach ($statuses as $status)
                             <option value="{{ $status->id }}">{{ $status->name }}</option>
                             @endforeach
                        </select>
                        @error('task_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Task description: </label>
                        <input id="mce" type="text" name="task_description" class="form-control" value="{{ $task->task_description }}"> 
                    </div>
                   
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
