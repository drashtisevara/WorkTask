<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\AccountModel;


class TransactionIndex extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::where('accounts_id',$account_id)
        ->get();  
        $accountUser = $this->getUsers();
        $accounts = $this->getAccounts();
        return view('transaction' ,  ['transactions'=> $transaction, 'account_id'=>$account_id ], compact('accountUser', 'accounts')); 
        
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
      return view('transaction' ,  ['transactions'=> $transaction, 'account_id'=>$account_id ], compact('accountUser'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $transaction = new Transaction;
        $transaction->account_models_id=$req->input('user_id');
        $transaction->amount=$req->amount;
        $transaction->type=$req->type;
        $transaction->category=$req->category;
        $transaction->note=$req->note;
        
        $transaction->users_id=auth()->user()->id;
        $transaction->accounts_id=$req->account_id;   
       




       

       
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

   
    public function update(Request $req,  $id)
    {
        $transactions = Transaction::find($id);
      
        $transactions->amount=$req->amount;
        $transactions->type=$req->type;
        $transactions->category=$req->category;
        $transactions->note=$req->note;

        $accounts = Account::find($transactions->accounts_id);

        if($req->type === 'income')
        {
            $accounts->total_balance += $transactions->amount;
        }
        else{
        $accounts->total_balance - $transactions->amount;
        }


       

    //    $accounts->save();

       DB::transaction(function () use ($transactions, $accounts) {
        $accounts->update();
        $transactions->update();
    });

    return redirect('transaction/'.$id);
    }
    public function destroy(Request $req,$id)
    {
        
            $transactions = Transaction::find($id);
            

            $accounts = Account::find($transactions->accounts_id);
            $accounts->decrement('total_transaction');

        if($req->type === 'income')
        {
            $accounts->total_balance += $transactions->amount;
        }
        else{
        $accounts->total_balance -= $transactions->amount;
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