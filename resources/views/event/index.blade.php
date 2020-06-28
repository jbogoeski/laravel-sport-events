@extends('layouts.app')

@section('content')

    <h1>Events List</h1>

<a class="btn btn-success mb-3 ml-3 mt-3" href="{{route('events.create')}}">Add a new event to the list</a>



@if(empty($events))
    <div class="alert alert-warning">
        The list of events is empty
    </div>

@else
<div class="table-rensponsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)


            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->name}}</td>
                <td>{{$event->date_start}}</td>
                <td>{{$event->date_stop}}</td>
                <td>
                    <form class="d-inline" action="{{route('events.destroy', $event->id)}}" method="POST">

                    <a class="btn btn-link-dark btn-primary" href="{{route('events.show', $event->id)}}">Show</a>
                   


                    @if(auth()->check() && Auth::user()->can('update', $event))


            
                    <a class="btn btn-link-dark btn-warning" href="{{route('events.edit', $event->id)}}">Edit</a>
                
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-link-dark btn-danger">Delete</button>
                    @endif    


                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endif



@endsection
