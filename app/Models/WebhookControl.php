<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebhookControl extends Model
{
    use HasFactory;
    protected $table = 'webhook_control';

    protected $fillable = [
        'cnpj',
        'webhook'
    ];
}