<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $categories   = Category::count();
        $open_ticket  = Ticket::whereIn('status', ['On Hold','In Progress'])->count();
        $close_ticket = Ticket::where('status', '=', 'Closed')->count();
        // $agents       = \DB::table('model_has_roles')->where('model_type', '=', 'App\Models\User')->where('role_id', '=', '2')->count();
        $agents       = User::where('parent',\Auth::user()->createId())->count();

        $categoriesChart = Ticket::select(
            [
                'categories.name',
                'categories.color',
                \DB::raw('count(*) as total'),
            ]
        )->join('categories', 'categories.id', '=', 'tickets.category')->groupBy('categories.id')->get();

        $chartData = [];
        $chartData['color'] = [];
        $chartData['name']  = [];
        $chartData['value'] = [];

        if(count($categoriesChart) > 0)
        {
            foreach($categoriesChart as $category)
            {
                $chartData['name'][]  = $category->name;
                $chartData['value'][] = $category->total;
                $chartData['color'][] = $category->color;
            }
        }

        $monthData = [];
        $barChart  = Ticket::select(
            [
                \DB::raw('MONTH(created_at) as month'),
                \DB::raw('YEAR(created_at) as year'),
                \DB::raw('count(*) as total'),
            ]
        )->where('created_at', '>', \DB::raw('DATE_SUB(NOW(),INTERVAL 1 YEAR)'))->groupBy(
            [
                \DB::raw('MONTH(created_at)'),
                \DB::raw('YEAR(created_at)'),
            ]
        )->get();


        $start = \Carbon\Carbon::now()->startOfYear();

        for ($i = 0; $i <= 11; $i++) {

            $monthData[$start->format('M')] = 0;
            foreach($barChart as $chart)
            {
                if(intval($chart->month) == intval($start->format('m')))
                {
                    $monthData[$start->format('M')] = $chart->total;
                }
            }
            $start->addMonth();
        }
        
        
        // review
        // Calculate average rating
    $averageRating = Review::avg('rating');

    // Calculate the number of votes for each rating
    $ratingCounts = Review::select(DB::raw('rating, COUNT(*) as count'))
        ->groupBy('rating')
        ->pluck('count', 'rating');
$totalReviews = Review::count();
    // Retrieve reviews with user details
    $reviews = Review::with('ticket')->latest()->take(10)->get();

    // Transform reviews data for the view
    $formattedReviews = $reviews->map(function ($review) {
        return [
           
            'userName' => $review->ticket->name,     // Replace with actual name field
            'date' => $review->created_at->format('F j, Y'), // Format the date as needed
            'text' => $review->comment,
            'rating' => $review->rating,
        ];
    });
        // dd('Cascda');
        return view('admin.dashboard.index', compact('categories', 'open_ticket', 'close_ticket', 'agents', 'chartData', 'monthData','averageRating','ratingCounts','formattedReviews','totalReviews'));
    }

}
