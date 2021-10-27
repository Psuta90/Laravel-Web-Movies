<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class new_upload extends Model
{
    use HasFactory;
    protected $table = 'new_upload';

    public function getRouteKeyName()
    {
        return 'id_newupload';
    }
}
