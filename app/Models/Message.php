<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conversation;



class Message extends Model
{
    use HasFactory;
    protected $fillable  =['user_id' ,'conversation_id' ,'body' , 'read'] ;
    public function conversation (){
        return $this->belongsTo(Conversation::class);
    }
}
