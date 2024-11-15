<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $fillable =[
        'name',
        'value',
        'client_id'
    ];

    public function clients(): HasOne   
    {
        return $this->hasOne(Client::class);
    }
}
