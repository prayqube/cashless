<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\Vendors;
use DB;
Use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;


class VendorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $vendors = \App\models\Vendors::getvendors();
        return view('vendors/viewvendors')->with (['vendors'=> $vendors]); 

    }

    public function create(Request $request)
    {
        //
      return view('vendors/addvendors'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required','max:9'],
            'first_name' =>['required' ,'max:255'],
            'last_name' =>['required','max:255' ],
            'address' =>['required','max:255'],
            'contact_no' =>['required','numeric','min:9'],
            'org_name' =>['required','max:255' ]
        ]);
        $request['role_id']=2;
        $input =$request->all();
        user::create([
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'contact_no' =>$request['contact_no'] ,
            'role_id' =>$request['role_id'],
            'remember_token'=>$request['_token']
        ]);
        $user = User::where('contact_no', $input['contact_no'])->first();
        $imagename="";
        if($user){
            if($request->isMethod('post') && isset($_FILES["input_img"]["type"]) && !empty($_FILES["input_img"]["type"])){
                $FILES = $_FILES["input_img"];
                $upload_dir = public_path('\uploads\ProfileImage\\');
                $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
                $target_file = md5(time());
                $imagename= $target_file.'.'.$imageFileType;
                $target_file = $upload_dir.$target_file.'.'.$imageFileType;
                move_uploaded_file($FILES["tmp_name"], $target_file);
            }
            // print_r($user->id);die();
            $profile= DB::table('vendor_profile')
            ->insert ([
                'user_id'=>$user->id
                ,'org_name'=>$request['org_name']
                ,'image_name' =>$imagename
                ,'status' =>'disabled'
                ,'address' =>$request['address']
                ,'parent_id'=>0

            ]);
            return redirect('/vendors')->with('message', 'Vendor Saved successfully');
        }
        return redirect('/vendors')->with('message', 'failed to save Vendor detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
       
         $vendor = \App\models\Vendors::getvendor($id);

        return view('vendors/editvendors')->with (['vendor'=> $vendor]); 
        
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
        $profile= DB::table('vendor_profile')
            ->where('user_id', $input['id'])
            ->first();
        $imagename=$profile ->image_name;

        if($request->isMethod('post') && isset($_FILES["input_img"]["type"]) && !empty($_FILES["input_img"]["type"]))
        {
          $FILES = $_FILES["input_img"];
                      print_r($FILES);die();

          $upload_dir = public_path('\uploads\ProfileImage\\');
          $imageFileType = pathinfo($FILES["name"],PATHINFO_EXTENSION);
            $target_file = md5(time());
        $imagename= $target_file.'.'.$imageFileType;

          $target_file = $upload_dir.$target_file.'.'.$imageFileType;
          move_uploaded_file($FILES["tmp_name"], $target_file);

         }

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
            'image_name'   => $imagename]);

        $users = User::where('id',$input['id'])->update($input);
        $vendor = \App\models\Vendors::getvendor($id);

            return redirect::back()->with(['vendor'=> $vendor,'message', 'Profile Details Updated successfully']);

      //  return reditect('vendors/editvendors') (['vendor'=> $vendor,'message', 'Profile Details Updated successfully']); 
        
        //print_r( $users);die();

      //  return view('/vendors/editvendors')->with('message', 'Profile Details Updated successfully');    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

         DB::table('users')->where('id',$id)->delete();
        DB::table('vendor_profile')->where('user_id',$id)->delete();

        return redirect('/vendors')->with('message', 'Vendor Deleted successfully');

    }

     public function approve($id)
    {

     DB::table('vendor_profile')->where('user_id',$id)->update(['status'=>'active']);
    return redirect('/vendors')->with('message', 'Status Updated successfully');


    }

 
}
