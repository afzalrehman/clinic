<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class appionment_fileModel extends Model
{
    public $table = 'appointments_file';
    protected $fillable = [
        'appointments_id',
        'file_path',
        'created_at',
        'updated_at',
    ];
}
