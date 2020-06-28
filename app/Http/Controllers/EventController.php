<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $events = Event::all();


        return view('event.index')->with([
            'events' => $events,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'event_image' => 'required|image',
            // 'date_start' => 'date|required',
            // 'date_stop' => 'date|required',
        ]);

        //Handle File Upload
        // if($request->hasFile('event_image')){
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('event_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // Get just ext
        //     $extension = $request->file('event_image')->getClientOriginalExtension();
        //     // Filename to store
        //     $fileNameToStore= $filename.'_'.time().'.'.$extension;
        //     // Upload Image
        //     $path = $request->file('event_image')->storeAs('', $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noimage.jpg';
        // }



        //Create Event
        $event = new Event;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $user = $request->user();
        $event->event_id = $request->user()->id;
        // $event->event_image = $request->file('event_image')->store();
        if ($request->file('event_image')) {
            $imagePath = $request->file('event_image');
            $imageName = $imagePath->getClientOriginalName();
  
            $event_image = $request->file('event_image')->storeAs('uploads', $imageName, 'public');
          }
  
          $event->event_image = $imageName;
          $event->event_image = ''.$event_image;


        $event->date_start = $request->input('date_start');
        $event->date_stop = $request->input('date_stop');
        $event->save();


    
    
    
        // $inputs = request()->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'event_image' => 'required|image',
        //     'date_start' => 'date|required',
        //     'date_stop' => 'date|required',
        // ]);
     
        // // $path = $request->file('event_image')->store('public/image');

        // $user  = $request->user();

        // $event = $user->events()->create($inputs);

        // // $event = Event::create($request->all());


        return redirect(route('events.index', ['events' => $event->id]))->withSuccess('The event has been successfully created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {   


        return view('event.show')->with([
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {

        // $event = User::find('id');
        // dd('here');

        $this->authorize('edit', $event);



        return view('event.edit')->with([
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {


        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date_start' => 'date|required',
            'date_stop' => 'date|required',

        ]);

        // $event = Event::find($id);
        $this->authorize($event);


            $event->update($request->all());

            // dd($event);
            return redirect(route('events.index', ['event' => $event]))->withSuccess('Updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {

        $event->delete();

        $this->authorize('delete', $event);


        return redirect()->back()->withSuccess('Deleted event');

    }
}
