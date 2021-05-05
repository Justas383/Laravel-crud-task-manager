@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
        @if (session('status_success'))
        <p style="color: green"><b>{{ session('status_success') }}</b></p>
    @else
        <p style="color: red"><b>{{ session('status_error') }}</b></p>
    @endif
           <div class="card">
               <div class="card-header">Create task:</div>
               <div class="card-body">
                   <form action="{{ route('tasks.store') }}" method="POST">
                       @csrf
                       <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="task_name" class="form-control">
                            @error('task_name')
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
                            @error('status_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Task description: </label>
                            <textarea id="mce" type="text" name="task_description" class="form-control"></textarea>
                        </div>
                       
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
