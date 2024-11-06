<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'description', 'user_id', 'status', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketChats()
    {
        return $this->hasMany(TicketChat::class);
    }
}
