<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'type', 'data', 'status','ticket_id'];
    
     public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}