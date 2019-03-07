<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\EventCategory;
use App\models\Event;
use App\models\EventAttachment;
use Illuminate\Http\Response as res;
use Validator;
use DB;
use App\Quotation;
use Auth;
class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $statusCode = Res::HTTP_OK;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $event_list = DB::table('events')->select('id','name','event_start_date','event_end_date','venue','address','city')->get();
        
        return view('events.event')->with('event_list',$event_list);
    }
    public function create()
    {
        $event_category = EventCategory::get();
        return view('events.create_event',compact('event_category'));
    }
    protected function fileUploading($image, $name){
       $path= public_path('events');
       $name = $name.'.'.$image->getClientOriginalExtension();
       $image->move($path, $name);
       return $name;
   }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description'=>'required',
            'event_start_date'=>'required',
            'event_end_date'=>'required',
            'event_duration'=>'required',
            'venue'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',
            'fee'=>'required',
            'head_count'=>'required',
           // 'qr_code'=>'required',
            'image'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors("All Fields are required")
                        ->withInput();
        }

        $input = $request->all();
        $files = $request->file('image');
        unset($input['image']); 
        
        
        // print_r($input);die;
        $input['event_start_date'] = strtotime($input['event_start_date']);
        $input['event_end_date'] = strtotime($input['event_end_date']);
        $input['user_id'] = Auth::user()->id;
        $event_category = Event::create($input)->id;
        foreach ($files as $file) {
        $fileName = rand(1, 999);
         $evet_attechment_input['file_name'] = $this->fileUploading($file, $fileName);
         $evet_attechment_input['event_id'] = $event_category;
         DB::table('event_attachments')->insert($evet_attechment_input);
        }
        $response = [
            // 'status'=>$this->$statusCode,
            'message'=>'success',
        ];
     return redirect('/event')->with($response);
    }
    public function view($id)
    {
        $event_list = Event::where('id',$id)->with('event_attechment')->first();
      //  print_r(json_encode($event_list['event_attachment']));die;
        // print_r($event_list);die();
        return view('events.view_event',compact('event_list'));
    }
    public function edit($id)
    {
        $event_list = Event::find($id);
        $event_category = EventCategory::get();
        $event_attachment = DB::table('event_attachments')->where('event_id',$id)->get();
        return view('events.edit_event',compact('event_list','event_category','event_attachment'));
    }
     public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description'=>'required',
            'event_start_date'=>'required',
            'event_end_date'=>'required',
            'event_duration'=>'required',
            'venue'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'pincode'=>'required',
            'fee'=>'required',
            'head_count'=>'required',
          //  'qr_code'=>'required',
            'image'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors("All Fields are required")
                        ->withInput();
        }
        $input = $request->all();
        unset($input['_token']);
        $files = $request->file('image');

         foreach ($files as $file) {
                $fileName = rand(1, 999);
                 $evet_attechment_input['file_name'] = $this->fileUploading($file, $fileName);
                 $evet_attechment_input['event_id'] = $input['id'];
                 DB::table('event_attachments')->insert($evet_attechment_input);
                }
         unset($input['image']); 
         $input['event_start_date'] = strtotime($input['event_start_date']);
         $input['event_end_date'] = strtotime($input['event_end_date']);
         $input['user_id'] = Auth::user()->id;
        $event_category = Event::where('id',$input['id'])->update($input);
        $response = [
            // 'status'=>$this->$statusCode,
            'message'=>'success',
        ];
        return redirect('/event');
    }
    public function delete($id)
    {
        $event = Event::find($id);
        $event->event_attechment()->delete();
        $event->delete();
       // Event::where('id',$id)->delete();
        return redirect('/event');
    }
    public function deleteImage($id){
        $event = EventAttachment::find($id);
        $event->delete();
        return redirect()->back();
    }
}
