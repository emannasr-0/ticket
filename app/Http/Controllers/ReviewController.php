<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Exports\ReviewsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('ticket')->orderBy('created_at', 'desc')->get();
        // dd($reviews);
        return view('admin.reviews.index',['reviews' => $reviews]);
    }
    
    public function fetchReviews()
    {
        $reviews = Review::with('ticket')->orderBy('created_at', 'desc')->get();
        return response()->json($reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForm($ticket_id)
    {
        return view('reviewForm', compact('ticket_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$ticket_id)
    {
        
         $this->validate($request, [
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string',
    ]);
    try{
        $ticket=Ticket::where('id',$ticket_id)->first();
    
        $review = Review::create([
            'user_email' => $ticket->email,
            'ticket_id' => $ticket->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
        return redirect('https://anasacademy.uk/');
    }
        catch (\Exception $e) {
        dd($e);
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
    
    public function export()
    {
        $name = 'Reviews' . date('Y-m-d i:h:s');
        $data = Excel::download(new ReviewsExport(), $name . '.xlsx');

        return $data;
    }
}
