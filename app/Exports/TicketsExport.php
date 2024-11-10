<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TicketsExport implements FromCollection ,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Ticket::orderBy('created_at','desc')->get();

        $data = $data->map(function ($ticket) {

        $category = Ticket::category($ticket->category);
        $priority = Ticket::Managepriority($ticket->priority);

        
        // unset($ticket->id, $ticket->attachments, $ticket->note, $ticket->created_by, $ticket->created_at, $ticket->updated_at);

       
        $ticketData = [
            "Ticket ID" => $ticket->ticket_id,
            "Name" => $ticket->name,  
            "Email" => $ticket->email,  
            "Category" => $category,
            "Status" => $ticket->status,  
            "Resolved Time" => $ticket->resolvetime,
            "Locked_by"=>$ticket->locked_by,
            "Priority" => $priority,
            "Subject" => $ticket->subject,
            "Description" => $ticket->description,  
        ];

        return $ticketData;
    });

    return $data;
    }

    public function headings(): array
    {
        return [
            "Ticket ID",
            "Name",
            "Email",
            "Category",
            "Status",
            "Resolved Time",
            "Locked_by",
            "Priority",
            "Subject",
            "Description",
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
            $row['Name'],
            $row['Email'],
            $row['Category'],
            $row['Status'],
            $row['Resolved Time'],
            $row['Locked_by'],
            $row['Priority'],
            $row['Subject'],
            $row['Description'],
        ];
    }
}



