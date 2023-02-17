<?php

namespace App\Models;

use App\Models\Cart;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'number_id',
        'name',
        'last_name',
        'email',
        'password',
        'phone',
        'address'

    ];

    protected $hidden = [
        'password',

    ];

    protected $appends = ['full_name'];

	protected $casts = [
		'created_at' => 'datetime:Y-m-d',
		'updated_at' => 'datetime:Y-m-d',
	];

	// Accessor (get)
	public function getFullNameAttribute()
	{
		return "{$this->name} {$this->last_name}";
	}

	// Mutator (create - update)
	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

    //Relations

    public function Customer()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }

    public function Cart()
   {
       return $this->belongsTo(Cart::class, 'cart_id', 'id');
   }

}
