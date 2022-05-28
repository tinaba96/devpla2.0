<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Images;
use Storage;
use Illuminate\Support\Facades\Validator;


class ImagesController extends Controller
{
	function show(){
		//アップロードした画像を取得
		$uploads = Images::orderBy("id", "desc")->get();

		return view("image_list",[
			"images" => $uploads
		]);
	}
	public function index(){
		$images = Images::all();
		$posts = Images::all();
		$data = [
			'images' => $images,
		];

		return view('welcome', $data);
	}

}