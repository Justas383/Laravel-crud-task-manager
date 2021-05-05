  
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="text-align: center; margin-top: 150px;">
                <h1>Welcome to my task manager!</h1>
                @if (!auth()->check())
                    <p>Please register and login to see the content.</p>
                @endif
                <p>Made by Justas Gudeika @Bit.lt</p>
            </div>
        </div>
    </div>
@endsection