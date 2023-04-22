<?php

namespace App\Http\Controllers;

use App\Mail\checkmail;
use App\Mail\forgetmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\LaravelIgnition\Http\Requests\UpdateConfigRequest;

class authcontroller extends Controller
{
    //
    public function signup(){
        return view('signup');
    }
    public function login(){
        return view('login');
    }

    public function sign_up(Request $request){
        $valdition=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'conf_password'=>'required',
            'image'=>'required',
            'role'=>'required'

            ]) ;  
            $pass=$request->password;
            $conf=$request->conf_password;

            if($valdition){
                if($pass==$conf){
                    $image=$request->file('image');
                    $extension=$image->getClientOriginalExtension();
                    $image_name=time().'.'.$extension;
                    $image_name_path='/storage/pics/'.$image_name;
                    $image->move('storage/pics',$image_name);
                    $insert=User::create([
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'password'=>Hash::make($request->password),
                        'role'=>$request->role,
                        'image'=>$image_name_path,
                        'status'=>'notactive'
                        ]);
                        if($insert){
                            $name=$request->name ;
                            Mail::to($request->email)->send(new checkmail($name));
                            return redirect('/');
                        }
                }
                else{
                    return "password is not match";
                }
            } 
    }
    public function log_in(Request $request){
    
            $email=$request->email ;
            $uson=User::where('email','=',$email)->first();
            $status=$uson->status;
            if (Hash::check($request->password,$uson->password)) {
                $role=$uson->role;
                session::put('name',$uson->name);
                session::put('role',$uson->role);


            if($role=='admin'){
                return redirect()->to('/admin');
                
            }
            else if($role=='vendor'){
                
                if($status=='notactive'){
                    return redirect()->to('/acticode');
                }
                else{
                return redirect()->to('/vendor');
                }
            }
            else{
                if($status=='notactive'){
                    return redirect()->to('/acticode');
                }
                else{
                return redirect()->to('/user');
                }
            }
            }
            else{
                return "password is not correct";
            }}

            public function acticode(){
                return view('activation');
            }

            public function acti(Request $request){
                if(session::has('name')){
                    $session=session::get('name');
                }
            
             $code=$request->code ;
             if($code == 55555){
                $update=User::where('name','=',$session)->Update([
                    'status'=>'activ'
                    ]);
                return '<a href="/logout">logout</a>';

             }
            }

            public function forget(){
                return view('forget') ;
            }
            public function for_get(Request $request){
                $email=$request->email ;
                Mail::to($request->email)->send(new forgetmail($email));
                return view('change',compact('email'));
            }
        
            public function cha_nge(Request $request){
               $code=$request->code;
               $email=$request->email;
               $pass=$request->password;
               $conf=$request->conf_password;
              if($code=='7777'){
              if($pass==$conf){
                User::where('email','=',$email)->update([
                    'password'=>Hash::make($request->password)  
                ]);
                
                return redirect()->to('/login');

              }  
              }
              
                    
        

            }


            public function change(){
                return view('change');
            }
           
       
public function admin(){
    if(session::has('name')){
        $session=session::get('name');
    }
    $user=User::where('name','=',$session)->first();
    return view('admin.admin',compact('session','user'));
}
public function vendor(){
    if(session::has('name')){
        $session=session::get('name');
    }
    $user=User::where('name','=',$session)->first();
    return view('vendor.vendor',compact('session','user'));
}
public function user(){
    if(session::has('name')){
        $session=session::get('name');
    }
    $user=User::where('name','=',$session)->first();
    return view('user.user',compact('session','user'));
}
public function logout(){
    session::forget('name');
    session::forget('role');
    return redirect()->to('/');
}




}