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
		if(!$this->checkSession()) {
			return Redirect::route('home');
		}

		$posts = $this->userRepo->getPosts();
		$posts->setBaseUrl('http://'.$_SERVER['HTTP_HOST'].'/paginate-post-roche');
		return View::make('post', compact('posts'));
	}

	public function paginatePosts()
	{
		$posts = $this->userRepo->getPosts();
		return Response::json(
			array(
				'data' => $posts->jsonSerialize(),
				'paginator' => $posts->links()->__toString()
			)
		);
	}

	public function thanks()
	{
		if(!$this->checkSession()) {
			return Redirect::route('home');
		}
		return View::make('thanks');
	}

	public function tagFriends()
	{
		if(!$this->checkSession()) {
			return Redirect::route('home');
		}
		return View::make('tag_friends');
	}

	public function add()
	{
		$values = Input::all();

		try {
			$rpta = $this->userRepo->add($values);
		} catch (PDOException $ex) {
			$rpta = array('load' => false, 'data' => array('sql_error' => $ex->getMessage()));
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
		if(!$this->checkSession()) {
			return Redirect::route('home');
		}

		Input::merge(array('id' => Session::get('user.id')));
		$rpta = $this->userRepo->addPost(Input::all());
		if ($rpta['load']) {
			return Redirect::to('tag-friends');
		} else {
			return Redirect::to('post-roche')->withErrors($rpta['data']);
		}
	}

	public function showPost($id)
	{
		$data = $this->userRepo->showPost($id);
		if ($data != null) {
			return $data->toJson();
		} else {
			return Response::json(array('load' => false, 'message' => 'No hay registro que mostrar'));
		}
	}

	public function checkSession()
	{
		return Session::has('user');
	}
}
