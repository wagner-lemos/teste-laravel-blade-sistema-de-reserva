<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

	protected $table = 'reservations';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['table_id', 'start_time', 'end_time'];
}
