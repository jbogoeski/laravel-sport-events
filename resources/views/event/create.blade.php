@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


<div class="container col-md-6">
<h1>Create Event</h1>

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-row">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-row">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" >
        </div>


        <div class="form-row`">
                <label for="file">Image</label>
                <input type="file" name="event_image" class="form-control-file" >
        </div>
        
        <div class="form-row">
            <label for="">Start Date</label>
            <input type="date" name="date_start" class="form-control" >
        </div>
        
        <div class="form-row">
            <label for="">End Date</label>
            <input type="date" name="date_stop" class="form-control" >
        </div>

      
        
        
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg mt-3">Create Event</button>
        </div>

    </form>

</div>

@endsection
