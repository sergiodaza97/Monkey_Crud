<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'type_document_id', 'updated_at'
    ];

    public $timestamps =False;

}
