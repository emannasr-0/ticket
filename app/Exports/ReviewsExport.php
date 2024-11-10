<?php

namespace App\Exports;

use App\Models\Review;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReviewsExport implements FromCollection ,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data = Review::get();

        $data = $data->map(function ($review) {
            $reviewData = [
                "Ticket ID" => $review->ticket->ticket_id,
                "Student Name" => $review->ticket->name,
                "Student Email" => $review->user_email,
                "Rating" => $review->rating,
                "Comment" => $review->comment,
            ];

            return $reviewData;
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            "Ticket ID",
            "Student Name",
            "Student Email",
            "Rating",
            "Comment",
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        $row = array_map('utf8_encode', $row);
    
        return [
            $row['Ticket ID'],
            $row['Student Name'],
            $row['Student Email'],
            $row['Rating'],
            $row['Comment'],
        ];
    }
}



