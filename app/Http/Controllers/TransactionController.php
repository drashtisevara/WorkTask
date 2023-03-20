<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\AccountModel;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($account_id)
    {
        
        $transactions = Transaction::where('accounts_id',$account_id)
        ->get();  
        $transactions = Transaction::with('account_models')->get();
        $transactions = Transaction::with('account')->get();
    
        $accountUser = $this->getUsers();
        $accounts = $this->getAccounts();

        $transactions = Transaction::where('accounts_id', $account_id)->orderByDesc('created_at')->get();
       
        
        
        return view('transaction' ,  ['transactions'=> $transactions, 'account_id'=>$account_id ], compact('accountUser', 'accounts')); 
        
    }

    public function showTransaction($account_id)
    {
        // $transactions = Transaction::all();
        $transactions = Transaction::whereIn('accounts_id', $account_id)->orderByDesc('created_at')->get();
        return view('transaction', ['transactions'=> $transactions, 'account_id'=>$account_id ], compact('transactions'));
        
      
    }

    public function show()
    {
        // $transactions = Transaction::all();
        $transactions = Transaction::orderByDesc('created_at')->get();
        return view('index', compact('transactions'));
        
      
    }



    

    protected function getAccounts()
    {
        return Account::all();
        
    }

    protected function getUsers()
    {
        return AccountModel::all();
    }

    public function create(Request $req)
    
    {

        
       
      
      $accountUser = AccountModel::all();
      return view('transaction' ,  ['transactions'=> $transactions, 'account_id'=>$account_id ], compact('accountUser'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, $account_id)
    {
        $transactions = new Transaction;
      
        $transactions->account_models_id=$req->input('user_id');
        $transactions->amount=$req->amount;
        $transactions->type=$req->type;
        $transactions->category=$req->category;
        $transactions->note=$req->note;
        
        $transactions->users_id=auth()->user()->id;
        $transactions->accounts_id=$req->account_id;   
       




       

        $accounts = Account::find($transactions->accounts_id);
        $accounts->increment('total_transaction');

        
        
        // $accounts->total_transaction->increment('total_transaction');
        // Perform addition or subtraction based on the transaction type



       
            if($req->type == 'income')
            {
                $accounts->total_balance += $transactions->amount;
            }
            elseif($req->type == 'expense'|| $req->type == 'transfer' )
            {
                $accounts->total_deduct = $accounts->total_deduct += $transactions->amount;
                $accounts->total_balance -= $transactions->amount;
            }
         
            
            

             
             
            

           
        
            
            
        
         
            
           
       
       
 
 
        // Save the transaction and update the account balance
        DB::transaction(function () use ($transactions, $accounts) {
            $accounts->save();
            $transactions->save();
        });
        return redirect()->back()->with('status', 'Transaction Created Successfully');
       
       
        
        
    }

    public function edit( $id)
    {
        $transactions = Transaction::find($id);
        
        // return redirect('transaction/'.$account_id);  
        return view('editTransaction',['transactions'=>$transactions]);
    }

   
    public function update(Request $req,  $account_id)
    {
        $transactions = Transaction::find($account_id);
      
        $transactions->amount=$req->amount;
        $transactions->type=$req->type;
        $transactions->category=$req->category;
        $transactions->note=$req->note;

        $accounts = Account::find($transactions->accounts_id);
        if($req->type == 'income')
        {
            $accounts->total_balance += $transactions->amount;
        }
        elseif($req->type == 'expense'|| $req->type == 'transfer' )
        {
            $accounts->total_deduct = $accounts->total_deduct += $transactions->amount;
            $accounts->total_balance -= $transactions->amount;
        }
     

       

    //    $accounts->save();

       DB::transaction(function () use ($transactions, $accounts) {
        $accounts->update();
        $transactions->update();
    });

    return redirect()->back()->with('status', 'Transaction Created Successfully');
    // return redirect('transaction/'.$account_id);
    }
    public function destroy(Request $req,$id)
    {
        
            $transactions = Transaction::find($id);
            

            $accounts = Account::find($transactions->accounts_id);
            $accounts->decrement('total_transaction');

            if($req->type == 'income')
            {
                $accounts->total_balance -= $transactions->amount;
            }
            elseif($req->type == 'expense'|| $req->type == 'transfer' )
            {
                $accounts->total_deduct = $accounts->total_deduct -= $transactions->amount;
                $accounts->total_balance += $transactions->amount;
            }
         
    //    $accounts->save();

       DB::transaction(function () use ($transactions, $accounts) {
        $accounts->save();
        $transactions->save();
    });

            
             $transactions->delete();
             
            
             return redirect()->back()->with('status', 'Transaction Deleted Successfully');
    
    }
}

    

    /**
     * Display the specified resource.
     */
    
    /**
     * Show the form for editing the specified resource.
     */
    

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
  