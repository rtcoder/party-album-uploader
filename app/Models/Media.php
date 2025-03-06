<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $album_id
 * @property string $file_path
 * @property string $mime_type
 */
class Media extends Model
{
    protected $fillable = ['album_id', 'file_path', 'mime_type'];
}
