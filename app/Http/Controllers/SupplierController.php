<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Vendors;
use DB;
Use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;
use View;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $suppliers = \App\models\Vendors::getSuppliers();
        return view('suppliers/view')->with (['suppliers'=> $suppliers]); 

    }

    public function create(Request $request)
    {
                 $users = user::where ('role_id','2')->get();
         return view('suppliers/add')->with(['users'=>$users]); 

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
            'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required','max:9'],
        'first_name' =>['required' ,'max:255'],
        'last_name' =>['required','max:255' ],
         'address' =>['required','max:255'],
         'contact_no' =>['required','numeric','min:9'],
        'org_name' =>['required','max:255' ],
        'parent_vendor'=>['required']
    ]);
        $input['id']=$request['id']; 
        
        $input['first_name']=$request['first_name'];
        $input['middle_name']=$request['middle_name'];
        $input['last_name']=$request['last_name'];
        $input['email']=$request['email'];
        $input['password']=$request['password'];
        $input['contact_no']=$request['contact_no'];
        $input['role_id']='3';
    $users = User::create($input);
     $user = User::where('contact_no', $input['contact_no'])->first();

        DB::table('vendor_profile')
            ->insert([
            'org_name'     => $request['org_name'],
            'user_id'      =>  $user->id,
            'address'      => $request['address'],
            'parent_id'   => $request['parent_vendor'],
            'status' =>'disabled',
            'image_name' =>'']);


            return redirect::back()->with('message', 'Profile Details Updated successfully');
    
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
       
         $supplier = \App\models\Vendors::getSupplier($id);
         $parentname = \App\models\Vendors::getSuppliersParentName($id);
         $users = user::where ('role_id','2')->get();

         $supplier->parentname=$parentname[0]->first_name.''.$parentname[0]->middle_name.''.$parentname[0]->last_name;
         return View::make('suppliers/edit')->with (['supplier'=> $supplier,'users'=>$users]); 
        
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

         $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required','max:9'],
        'first_name' =>['required' ,'max:255'],
        'last_name' =>['required','max:255' ],
         'address' =>['required','max:255'],
         'contact_no' =>['required','numeric','min:9'],
        'org_name' =>['required','max:255' ],
        'parent_vendor'=>['required']
    ]);
        $input['id']=$request['id']; 
        $profile= DB::table('vendor_profile')
            ->where('user_id', $input['id'])
            ->first();

        $input['first_name']=$request['first_name'];
        $input['middle_name']=$request['middle_name'];
        $input['last_name']=$request['last_name'];
        $input['email']=$request['email'];
        $input['password']=$request['password'];
        DB::table('vendor_profile')
            ->where('id', $profile->id)
            ->update([
            'org_name'     => $request['org_name'],
            'user_id'      =>  $input['id'],
            'address'      => $request['address'],
            'parent_id'   => $request['parent_vendor']]);

        $users = User::where('id',$input['id'])->update($input);
        $supplier = \App\models\Vendors::getSupplier($id);

            return redirect::back()->with(['supplier'=> $supplier,'message', 'Profile Details Updated successfully']);

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        // DB::table('users')->where('id',$id)->delete();
        DB::table('vendor_profile')->where('user_id',$id)->update(['status'=>'disabled']);

        return redirect('/suppliers')->with('message', 'Supplier Disabled successfully');

    }

     public function approve($id)
    {

        DB::table('vendor_profile')->where('user_id',$id)->update(['status'=>'active']);

     //DB::table('users')->where('id',$id)->update(['status'=>'active']);
          //DB::table('vendor_profile')->where('id',$id)->update(['status'=>1]);

             return redirect('/suppliers')->with('message', 'Status Updated successfully');


    }

 
}
