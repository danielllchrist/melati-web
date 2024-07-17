<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\Size;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->view('customer.review');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($transactionID, $productID)
    {
        $transactionDetail = TransactionDetail::where('transactionID', $transactionID)
            ->where('productID', $productID)
            ->firstOrFail();

        $product = Product::findOrFail($transactionDetail->productID);
        $size = Size::findOrFail($transactionDetail->sizeID);

        return view('customer.review', compact('transactionDetail', 'product', 'size'));
    }

    public function store(Request $request, $transactionID, $productID)
    {
        $request->validate([
            'product_rating' => 'required|integer|min:1|max:5',
            'review_text' => 'nullable|string|max:1000',
        ]);

        $transactionDetail = TransactionDetail::where('transactionID', $transactionID)
            ->where('productID', $productID)
            ->firstOrFail();

        // Membuat review baru
        $review = new Review();
        $review->transactionID = $transactionDetail->transactionID;
        $review->productID = $transactionDetail->productID;
        $review->rating = $request->product_rating;
        $review->comment = $request->review_text;
        $review->save();

        return redirect()->route('CustomerMyOrder');
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
