@extends('layouts.app')
@section('content')
<div class="card-body">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Status name</th>
            <th>Actions</th>
        </tr>
        @foreach ($statuses as $status)
        <tr>
            <td>{{ $status->id }}</td>
            <td>{!! $status->name !!}</td>
            
            <td>
                <form action={{ route('statuses.destroy', $status->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('statuses.edit', $status->id) }}>Update</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('statuses.create') }}" class="btn btn-success">Add</a>
    </div>
</div>
@endsection
 