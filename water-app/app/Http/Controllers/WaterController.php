<?php

namespace App\Http\Controllers;
use App\Models\Water;
use App\Models\Seal;
use App\Models\Serialregistry;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class WaterController extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect()->intended(route('registration'));
        }
        return view ('login');
    }
    function registration(){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        return view ('registration');
    }

    function sealregistration(){
        if(Auth::check()){
            return redirect()->intended(route('home'));
        }
        return view ('sealregistration');
    }
    function staff()
    {
        $users = Water::all();

        return view('staff', compact('users'));
    }
    function seal()
    {
        $seals = Seal::all();

        return view('seal', compact('seals'));
    }


    function loginPost(Request $request)
    {
            $credentials = $request->validate([
                'email'=>['required'],
                'password'=>['required'],
            ]);
            $isAdmin=DB::table('admin')
            ->where('email',$credentials['email'])
            ->where('password',($credentials['password']))
            ->exists();
        $email = $request->input('email');
        $password = $request->input('password');
        
        if ($isAdmin) {
            return redirect()->route('staff')->with("success","Successful admin Login");
        } else {
            return redirect()->route('login')->with("error", 'Invalid username or password');
        }
    }
    function registrationPost(Request $request){
        $request->validate([
            'first_name'=>'required',
            'second_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:staffdetails',
            'mobile_number'=>'required|unique:staffdetails',
            ]);
            $data['first_name']=$request->first_name;
            $data['second_name']=$request->second_name;
            $data['last_name']=$request->last_name;
            $data['email']=$request->email;
            $data['mobile_number']=$request->mobile_number;

            $user=Water::create($data);  
            
            if(!$user){
                return redirect(route('registration'))->with("error","Registration Failed ,Try again");
            }
                return redirect(route('staff'))->with("success","Registration successful");
        }
     function sealregistrationPost(Request $request){
        $request->validate([
            'batch_no'=>'required',
            'serial_start_no'=>'required|integer|between:1,500|unique:seal_registry',
            'serial_end_no'=>'required|integer|between:1,500|unique:seal_registry',
        ]);
        $data['batch_no']=$request->batch_no;
        $data['serial_start_no']=$request->serial_start_no;
        $data['serial_end_no']=$request->serial_end_no;
        $data['quantity'] = $data['serial_end_no'] - $data['serial_start_no'];
        $seal=Seal::create($data);  
        
        if(!$seal){
            return redirect(route('sealregistration'))->with("error","Registration Failed ,Try again");
        }
        for ($i = $seal->serial_start_no; $i <= $seal->serial_end_no; $i++) {
            $serialNumber = new SerialRegistry();
            $serialNumber->sr_id= $seal->id;
            $serialNumber->serial_no = $i;
            $serialNumber->save();
        }
        
        return redirect(route('seal'))->with("success","Registration successful");
    }

        public function performAction(Request $request)
        {
            $action = $request->input('action');
            $staff_id = $request->input('staff_id');
        
            if ($action === 'delete') {
                if (!empty($staff_id)) {
                    $user = Water::find('staff_id');
                    if ($user) {
                        $user->delete();
                        return redirect()->route('staff')->with('message', 'User deleted successfully.');
                    } else {
                        return redirect()->route('staff')->with('message', 'User not found.');
                    }
                } else {
                    return redirect()->route('staff')->with('message', 'No user selected for deletion.');
                }
            } elseif ($action === 'edit') {
                if (!empty($staff_id)) {
                    $user = Water::find($staff_id);
                    if ($user) {
                        return redirect()->route('edit', ['staff' => $user]);
                    } else {
                        return redirect()->route('staff')->with('message', 'Staff member not found.');
                    }
                } else {
                    return redirect()->route('staff')->with('message', 'No staff selected for editing.');
                }
            }
        
            return redirect()->route('staff')->with('message', 'Invalid action.');
        }
        public function edit(Water $staff)
    {
        return view('edit', ['staff' => $staff]);
    }
    public function update(Request $request)
    {
        $staff_id = $request->input('staff_id');
        $staff_data = [
            'first_name' => $request->input('first_name'),
            'second_name' => $request->input('second_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile_number' => $request->input('mobile_number'),
        ];
        Water::where('id', $staff_id)->update($staff_data);

        return redirect()->route('staff')->with("success", "Staff updated successfully.");
            
    }

    function delete(Water $staff)2
    {
        // $user = Water::find($staff_id);
        if ($staff) {
            $staff->delete();
            return redirect()->route('staff')->with("success","Customer deleted successfully");
        } else {
            return redirect()->route('staff')->with(["error","Customer not found"], 404);
        }
    }
        public function performAction2(Request $request){

            $action = $request->input('action');
            $seal_id = $request->input('seal_id');
        
          if ($action === 'delete') {
          if (!empty($seal_id)) {
              $seal = Seal::find('seal_id');
              if ($seal) {
                  $seal->delete();
                  return redirect()->route('seal')->with('message', ' Seal deleted successfully.');
                    } else {
                        return redirect()->route('seal')->with('message', 'Seal not found.');
                    }
                } else {
                    return redirect()->route('seal')->with('message', 'No seal selected for deletion.');
                }
            } elseif ($action === 'edit') {
                if (!empty($seal_id)) {
                    $seal = Seal::find($seal_id);
                    if ($seal) {
                        return redirect()->route('editseal', ['seal' => $seal]);
                    } else {
                        return redirect()->route('seal')->with('message', 'Seal No not found.');
                    }
                } else {
                    return redirect()->route('seal')->with('message', 'No seal for editing.');
                }
            }
        
            return redirect()->route('seal')->with('message', 'Invalid action.');
        }
        public function editseal(Seal $seal)
    {
        return view('editseal', ['seal' => $seal]);
    }
    public function updateseal(Request $request)
    {
        $seal_id = $request->input('seal_id');     
        $request->validate([
            // 'batch_no'=>'required',
            // 'serial_start_no'=>'required|integer|between:1,500',
            // 'serial_end_no'=>'required|integer|between:1,500',
            'batch_no'=>'required',
            'serial_start_no'=>[
                'required',
                'integer',
                'between:1,500',
                Rule::unique('seal_registry')->ignore($seal_id),
            ],
            'serial_end_no'=>[
                'required',
                'integer',
                'between:1,500',
                Rule::unique('seal_registry')->ignore($seal_id),
            ],
        ]);
        // foreach $seals as $seal;
        //     if seal_id != seal_id:
        //         if serial_start_no != serial.serial_start_no && serial_end_no;
        //             pass
        //         else;
        //             if serial_start_no != serail.serail_start_no :
        //                 throw seal_start exists
        //             else if serail_end != serail...:
        //                 throw serial_end exists
        $data['batch_no']=$request->batch_no;
        $data['serial_start_no']=$request->serial_start_no;
        $data['serial_end_no']=$request->serial_end_no;
        $data['quantity'] = $data['serial_end_no'] - $data['serial_start_no'];


        Seal::where('id', $seal_id)->update($data);
    
        return redirect()->route('seal')->with("success", "Seal updated successfully.");
    }
    function deleteseal(Seal $seal)
    {
        // $user = Water::find($staff_id);
        if ($seal) {
            $seal->delete();
            return redirect()->route('seal')->with("success"," Seal deleted successfully");
        } else {
            return redirect()->route('seal')->with(["error","Seal not found"], 404);
        }
    }        
    }

   
    
    

