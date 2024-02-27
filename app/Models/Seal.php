<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Seal extends Model
{
    
    use HasFactory,Notifiable,HasApiTokens;
    protected $table ="seal_registry";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'batch_no',
        'serial_start_no',
		'serial_end_no',
        'quantity',
    ];
	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}
	
	/**
	 * @param mixed $fillable 
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
	
	public function serialNumbers()
    {
        return $this->hasMany(SerialRegistry::class, 'sr_id');
    }
}
