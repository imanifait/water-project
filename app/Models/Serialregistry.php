<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Serialregistry extends Model
{
    
    use HasFactory,Notifiable,HasApiTokens;
    protected $table ="serial_no_registry";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'sr_id',
        'serial_no',
		'status',
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

    public function Seal(){
        return $this->belongsTo(Seal::class,'sr_id','id');
    }

    
}
