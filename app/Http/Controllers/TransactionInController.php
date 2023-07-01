<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class TransactionInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transactionin.index', [
            'transactionins' => Transaction::where('type', 'd')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactionin.create', [
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
        $validate['type'] = 'd';


        $product = Product::findOrFail($request->product_id);
        // $stok = $product->stock;
        if (!$request->price) {
            $validate['price'] = $request->stock * $product->price;
        } else {
            $validate['price'] = $request->stock * $request->price;
        }
        if ($product) {
            $product->stock += $request->stock;
            $product->save();
        }
        $data = Transaction::create($validate);
        // dd($validate);

        // dd($product);
        return redirect()->route('transactionin.index');
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
