<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
Use App\models\EventItems;
Use App\models\Events;
Use DB;
use Validator;
use View;


class EventItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = EventItems::getEventItems ();
        $Count = \DB::table('event_items')->groupby('event_id')
            ->count();
        return view('eventItems/viewitem')->with (['items'=> $items,'count'=>$Count]); 

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $validatedData = $request->validate([
        'event' => ['required' ],
        'item_name.*' => ['required','max: 255'],
       'item_price.*' => ['required' ,'numeric']
        ]);
        
   //  $event_id=$request->event;


    $input = $request->all();


    for($i=0; $i<= count($input['item_name'])-1; $i++) {

         $data = [ 
    'event_id' =>  $input['event'],
    'item_name' => $input['item_name'][$i],
    'item_price' =>$input['item_price'][$i], // see above for why this might be a bad idea

  ];
    EventItems::create($data);
    }

        //$items =EventItems::create($input);
 $eventlist = DB::table('events')->get();
     return redirect()->back()->with (['eventlist'=> $eventlist,'message'=> 'Items added successfully']);

     }


    public function create(Request $request)
    {
      $eventlist = DB::table('events')->get();

       return view('eventItems/additem',compact('eventlist'));     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $itemlist = Eventitems::where ('event_id',$id)->get();

     return View::make("eventItems/edititem")->with (['itemlist'=> $itemlist]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
        'item_name.*' => ['required','max: 255'],
       'item_price.*' => ['required' ,'numeric']
        ]);

        $input=$request->all();
            DB::table('event_items')->where('event_id', '=', $input['event_id'])->delete();
    for($i=0; $i<= count($input['item_name'])-1; $i++) {

         $data = [ 
    'event_id' =>  $input['event_id'],
    'item_name' => $input['item_name'][$i],
    'item_price' =>$input['item_price'][$i], 

  ];
    EventItems::create($data);
    }

        //$items =EventItems::create($input);

        return redirect('/eventitem')->with('message', 'Items updated successfully');

    
       Print_r($input);die();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }


     public function delete($id)
    {
        EventCategory::where('id',$id)->delete();
        return redirect('/eventcategories')->with('message', 'Event Category Deleted successfully');
    }


}
