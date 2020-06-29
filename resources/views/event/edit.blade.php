@extends('layouts.app')

@section('content')


<div class="container col-md-6">
<h1>Edit Event</h1>

    <form action="{{route('events.update', ['event'=>$event->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

  
        <div class="form-row">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$event->name}}" >
        </div>

        <div class="form-row">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" value="{{$event->description}}" >
        </div>


        <div class="form-row`">
                <label for="file">Image</label>
                <input type="file" name="event_image" class="form-control-file" value="{{$event->event_image}}" >
        </div>
        
        <div class="form-row">
            <label for="">Start Date</label>
            <input type="date" name="date_start" class="form-control" value="{{ Carbon\Carbon::parse($event->date_start)->format('Y-m-d')}}">
        </div>
        
        <div class="form-row">
            <label for="">End Date</label>
            <input type="date" name="date_stop" class="form-control" value="{{ Carbon\Carbon::parse($event->date_stop)->format('Y-m-d')}}" >
        </div>
        
        
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg mt-3">Update Event</button>
        </div>

    </form>
</div>

@endsection
