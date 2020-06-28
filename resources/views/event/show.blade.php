@extends('layouts.app')



@section('content')

<div class="container-fluid">
  <h1>Event</h1>
  <p>{{ $event->name }}</p>
  <div class="row">
    <div class="col-sm-6 col-sm-push-8" ><img width="550" src="{{ asset($event->event_image) }}" alt=""></div>
    <div class="col-sm-6 col-sm-push-8" >
    <h5>Starting : {{Carbon\Carbon::parse($event->date_start)->format('d M Y')}}</h5>
    <p><h5>Ending : {{Carbon\Carbon::parse($event->date_start)->format('d M Y')}}</h5></p>
    
    
    </div>
  </div>
  <hr>
  <h2 ><strong> Description:</strong></h2>
  <hr>
  <p>{{ $event->description }}</p>
</div>



@endsection