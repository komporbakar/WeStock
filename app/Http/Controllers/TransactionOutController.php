<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class TransactionOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactionout.index', [
            'transactionouts' => Transaction::where('type', 'c')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactionout.create', [
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $date->setTimezone(new DateTimeZone('Etc/GMT-7'));
        $dateString = $date->format('Y-m-dH:i:s');
        $datetime = str_replace(['-', ':'], '', $dateString);

        $validate = $request->validate([
            'name' => ['required'],
            'product_id' => 'required',
            'transaction_date' => 'required',
            'stock' => 'required',
        ]);
        $validate['invoice_id'] = "#LS-" . $datetime . mt_rand(100, 999);
        $validate['type'] = 'c';


        $product = Product::findOrFail($request->product_id);

        $validate['price'] = $request->stock * $product->price;

        if ($product) {
            $product->stock -= $request->stock;
            $product->save();
        }
        $data = Transaction::create($validate);

        return redirect()->route('transactionout.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
