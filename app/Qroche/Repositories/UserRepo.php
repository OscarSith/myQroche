<?php
namespace Qroche\Repositories;

use Qroche\Entities\User;

class UserRepo extends BaseRepo
{
	public function getModel()
	{
		return new User;
	}

	public function add($values)
	{
		$validator = \Validator::make($values, $this->model->getRules());
		if ($validator->fails()) {
			return array('load' => false, 'data' => $validator);
		}
		$user = new User;
		$user->fill($values);
		$user->save();
		return array('load' => true, 'data' => $user->getAttributes());
	}

	public function getPosts()
	{
		return User::where('estado', 'A')->where('post', '!=', '')->take(4)->orderBy('id', 'desc')->get(array('alias', 'post', 'created_at'));
	}

	public function addPost($values)
	{
		$validator = \Validator::make($values,
			array(
				'id' => 'integer',
				'post' => 'required'
			)
		);
		if ($validator->fails()) {
			return array('load' => false, 'data' =>$validator);
		}

		$user = $this->find($values['id']);
		$user->post = $values['post'];
		return array('load' => $user->save());
	}
}