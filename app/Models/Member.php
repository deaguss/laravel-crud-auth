<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'no_hp',
        'gender',
        'alamat' ,
        'trainer_id',
        'created_at',
        'updated_at',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    /**
     * The roles that belong to the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(item::class, 'detail_anggota_items', 'member_id', 'item_id');
    }

    /**
     * Get the user that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainerMember()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id', 'id');
    }
}
