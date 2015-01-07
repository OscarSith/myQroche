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
			'dni' => 'required|digits:8|unique:users,dni',
			'nombre' => 'required',
			'apellido' => 'required',
			'alias' => 'required|unique:users,alias',
			'genero' => 'required',
			'nacimiento' => 'date',
			'email' => 'required|email|unique:users,email',
			'telefono' => 'sometimes',
			'celular' => 'required',
			'terminos' => 'accepted'
		);
	}
}
