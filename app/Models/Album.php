<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $hash
 * @property Media[] $media
 */
class Album extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'hash'];
    protected $hidden = ['hash'];
    protected $with = [
        'media',
    ];

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
