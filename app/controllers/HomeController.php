<?php

use Qroche\Repositories\UserRepo;

class HomeController extends BaseController {

	protected $userRepo;

	public function __construct(UserRepo $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	public function showWelcome()
	{
		return View::make('home');
	}

	public function register()
	{
		return View::make('register');
	}

	public function postRoche()
	{
		$this->checkSession();
		$posts = $this->userRepo->getPosts();
		return View::make('post', compact('posts'));
	}

	public function thanks()
	{
		$this->checkSession();
		return View::make('thanks');
	}

	public function tagFriends()
	{
		$this->checkSession();
		return View::make('tag_friends');
	}

	public function add()
	{
		$values = Input::all();

		try {
			$rpta = $this->userRepo->add($values);
		} catch (PDOException $ex) {
			$rpta = array('load' => false, 'data' => $ex->getMessage());
		}

		if ($rpta['load']) {
			Session::put('user', $rpta['data']);
			return Redirect::to('post-roche');
		} else {
			Session::flash('user', $values);
			return Redirect::to('register')->withErrors($rpta['data']);
		}
	}

	public function addPost()
	{
		$this->checkSession();

		Input::merge(array('id' => Session::get('user.id')));
		$rpta = $this->userRepo->addPost(Input::all());
		if ($rpta['load']) {
			return Redirect::to('tag-friends');
		} else {
			return Redirect::to('post-roche')->withErrors($rpta['data']);
		}
	}

	public function checkSession()
	{
		if (!Session::has('user')) {
			return Redirect::to('home');
		}
	}
}
