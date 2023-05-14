<?php

declare(strict_types=1);

namespace App\Model;



/**
 * @property int $id 
 * @property int $invited_id 
 * @property int $user_id 
 */
class Recommendation extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'recommendation';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = ['code','invited_id','user_id' , 'level'];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'invited_id' => 'integer', 'user_id' => 'integer'];
}
