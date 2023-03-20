<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountModel;
use App\Models\Account;
use Illuminate\Support\Facades\Validator;

use Session;

class Account_User extends Controller
{
    
    public function index( $account_id)
    {
        $accountUser = AccountModel::where('accounts_id',$account_id)->get();       
        return view('users' , ['accounts_user'=> $accountUser, 'account_id'=>$account_id]);       
    }

    public function create(Request $req, $account_id)
    {
        $validate = $req->validate([
            'user_name' => 'required',
            'user_email' => 'required|string|email|min:10|max:255',
            'user_phone' => 'required'
        ]);
        
        $accountUser = new AccountModel;
 
        $accountUser->user_name=$req->user_name;
        $accountUser->user_email=$req->user_email;
        $accountUser->user_phone=$req->user_phone;
        $accountUser->users_id=auth()->user()->id;
        $accountUser->accounts_id=$req->account_id;
        
        $accountUser->save();
        return redirect('users/'.$account_id);   
            
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        
            
        

            
      
       
    }

    /**
     * Display the specified resource.
     */
    public function show($account_id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $req , $account_id)
    {
        // $accountUser = AccountModel::where('accounts_id',$account_id)->get();       
        // return view('editusers' , ['accounts_user'=> $accountUser, 'account_id'=>$account_id]);   
        $accountUser = AccountModel::find($account_id);
        return view('edituser',['accounts_user'=>$accountUser]);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req,  $account_id)
    {
          
        $accountUser = AccountModel::find($account_id);
 
        $accountUser->user_name=$req->user_name;
        $accountUser->user_email=$req->user_email;
        $accountUser->user_phone=$req->user_phone;
    
        
        $accountUser->update();
        
        // return view('editusers' , ['accounts_user'=> $accountUser, 'account_id'=>$account_id]);  
        
        // return redirect('users/'.$account_id);
        return redirect()->back()->with('status', 'User Updated  Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
            $accountUser = AccountModel::find($id);
             $accountUser->delete();
             return redirect()->back()->with('status', 'User Deleted Successfully');
            
        
    
    }
}