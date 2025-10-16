<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'order_no',
        'customer_name',
        'company',
        'product',
        'order_date',
        'date_start',
        'date_end',
        'rating_quality',
        'rating_timeliness',
        'rating_service',
        'rating_price',
        'rating_overall',
        'comment',
    ];
}