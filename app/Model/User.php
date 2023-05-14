<?php

declare(strict_types=1);

namespace App\Model;



/**
 * @property int $id 
 * @property int $name 
 * @property string $aff 
 * @property int $invited_by 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'users';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['name','invited_by','aff'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'name' => 'integer', 'invited_by' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
