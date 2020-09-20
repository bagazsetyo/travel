<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionsDetail;
use App\TravelPackages;
use Carbon\Carbon;
use Auth;
use Validate;
use DB;

class CheckoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $items = Transaction::with(['details','travel_package','user'])->findOrFail($id);
        return view('pages.checkout')->with([
            'item' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);


        $data = $request->all();
        $data['transaction_id'] = $id;

        TransactionsDetail::create($data);

        $transaction = Transaction::with(['travel_package'])->find($id);
        
        // update visa jika ada orang lain yang di tambah
        if ($request->is_visa) {
            $transaction->transaction_total += 190;
            // sama seperti atas
            // $transaction->transaction_total = $transaction->transaction_total + 190;

            $transaction->additional_visa += 190;
        }
        // dd($data);
        $transaction->transaction_total += $transaction->travel_package->price;
        $transaction->save();

        return redirect()->route('checkout', $id); 
    }

    public function store(Request $request, $id)
    {
        $travel_package = TravelPackages::findOrFail($id);

        $transaction = Transaction::create([
            'travel_packages_id'    => $id,
            'user_id'               => Auth::user()->id,
            'additional_visa'       => 0,
            'transaction_total'     => $travel_package->price,
            'transaction_status'    => 'IN_CARD',
        ]);

        TransactionsDetail::create([
            'transaction_id'    => $transaction->id,
            'username'          => Auth::user()->username,
            'nationality'       => 'ID',
            'is_visa'           => false,
            'doe_passport'      => Carbon::now()->addYears(5),
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $detail_id)
    {
        $item = TransactionsDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details','travel_package'])
                                    ->findOrFail($item->transaction_id);
        
        if ($item->is_visa == 0) {
            $transaction->transaction_total -= 190;
            // sama seperti atas
            // $transaction->transaction_total = $transaction->transaction_total + 190;

            $transaction->additional_visa -= 190;
        }
        // echo $transaction->additional_visa;
        $transaction->transaction_total -= $transaction->travel_package->price;
        // echo $transaction->travel_package->price;
        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }
    
    public function success(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();
        return view('pages.success');
    }


}
