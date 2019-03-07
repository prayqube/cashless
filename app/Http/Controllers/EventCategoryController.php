<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\models\EventCategory;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $eventCategories = EventCategory::all ();

        return view('eventCategory')->with (['event_categories'=> $eventCategories]); 

        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =$request->all();
        $eventCagetory =EventCategory::create($input);

        return redirect('/eventcategories')->with('message', 'Event Category Saved successfully');

        }


    public function create(Request $request)
    {
        return view('addeventcategory');     

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $eventCategory = EventCategory::find($id);

        return view('editeventcategory')->with (['eventCategory'=> $eventCategory]);            

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $input['id']=$request['id']; 
        $input['event_category']=$request['event_category'];
        $input['category_description']=$request['category_description'];
        $event_category = EventCategory::where('id',$input['id'])->update($input);
        return redirect('/eventcategories')->with('message', 'Event Category Updated successfully');


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
