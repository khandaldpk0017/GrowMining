<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketChat extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id ', 'user_id ', 'admin_id ', 'message'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function superAdmin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
