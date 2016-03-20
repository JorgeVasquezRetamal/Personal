<?php
namespace sistema;
use \Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Documentos extends Eloquent implements UserInterface, RemindableInterface {


	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'documentos';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */

	public function usuario()
	{
		return $this->belongsTo('sistema\User', 'usuarios_id');
	}

}
