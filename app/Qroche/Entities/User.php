<?php
namespace Qroche\Entities;

class User extends \Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = array(
		'dni',
		'nombre',
		'apellido',
		'alias',
		'genero',
		'nacimiento',
		'email',
		'telefono',
		'celular',
		'post'
	);

	public function getRules() {
		return array(
			'dni' => 'required|digits:8',
			'nombre' => 'required',
			'apellido' => 'required',
			'alias' => 'required',
			'genero' => 'required',
			'nacimiento' => 'date',
			'email' => 'required|email',
			'telefono' => 'sometimes',
			'celular' => 'required',
			'terminos' => 'accepted'
		);
	}
}
