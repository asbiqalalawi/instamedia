<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use Kint\Parser\ToStringPlugin;

class Home extends BaseController
{
	public function index()
	{
		$posting = $this->PostModel->orderBy('date', 'DESC');

		$data = [
			'post' => $posting->get()->getResultArray(),
			'LikesModel' => $this->LikedModel
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

	public function like()
	{
		$post = $this->request->getVar('id_post');
		$user = session()->get("name");

		$this->LikedModel->save([
			'id_post' => $post,
			'user' => $user,
		]);

		return redirect()->to("/home");
	}

	public function unlike($id_post)
	{
		$delete = $this->LikedModel->where('id_post', $id_post)->where('user', session()->get('name'))->first();
		$idlike = strval($delete['id_like']);
		$this->LikedModel->delete($delete);

		return redirect()->to("/home");
	}
}
