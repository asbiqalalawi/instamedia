<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'post' => $this->PostModel->get()->getResultArray()
		];

		if (!session()->get('login')) {
			return redirect()->to('/auth');
		} else {
			return view('users/Home', $data);
		}
	}

	public function post()
	{
		return view('users/Post');
	}

	public function posting()
	{
		//Mengambil gambar
		$fileimage = $this->request->getFile('image');

		//Memindahlan file ke img
		$fileimage->move('img');

		//Mengambil nama file
		$imagename = $fileimage->getName();

		$this->PostModel->save([
			'user' => session()->get('name'),
			'description' => $this->request->getVar('description'),
			'image' => $imagename,
			'date' => Time::now(),

		]);

		return redirect()->to('/home');
	}
}
