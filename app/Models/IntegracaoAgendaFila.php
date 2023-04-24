<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class IntegracaoAgendaFila extends Model
{
    use HasFactory;
    protected $table = 'integracao_agenda_fila';

    protected $fillable = [
        'created_at',
        'updated_at',
        'dados'

    ];
    protected $casts = [
        'dados' => 'array'
    ];


}