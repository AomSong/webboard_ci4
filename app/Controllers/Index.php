<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoryModel;
use App\Models\WebboardModel;
use App\Models\CommentModel;

class Index extends Controller
{
	public function index()
	{
		$CategoryModel = new CategoryModel();
		$data['categorys'] = $CategoryModel->orderBy('category_id ', 'DESC')->findAll();

		// $WebboardModel = new WebboardModel();
		// $data['webboards'] = $WebboardModel->orderBy('Webboard_id ', 'DESC')->limit(4)->find();

		$WebboardModel = new WebboardModel();
		$Webboard = $WebboardModel;
		$Webboard->select('*');
		$Webboard->join('category', 'category.category_id = webboard.category_id');
		$Webboard->limit(4);
		$Webboard->orderBy('webboard.Webboard_id ', 'DESC');
		$query = $Webboard->get();
		$data['webboards'] = $query->getResultArray();

		return view('Theme/index', $data);
	}

	public function index_view($id = null)
	{
		$WebboardModel = new WebboardModel();
	    $WebboardModel->join('category', 'category.category_id = webboard.category_id');
        $data['webboard_view'] = $WebboardModel->where('webboard_id', $id)->first();

		$CommentModel = new CommentModel();
		$Comment = $CommentModel;
		$Comment->select('*');
		$Comment->join('user', 'comment.user_id = user.user_id');
		$Comment->join('webboard', 'comment.webboard_id = webboard.webboard_id');
		$Comment->where('comment.webboard_id', $id);
		$query = $Comment->get();
		$data['comment_views'] = $query->getResultArray();

		$CommentModel = new CommentModel();
		$Comment = $CommentModel;
		$Comment->selectCount('comment_id');
		$Comment->where('comment.webboard_id', $id);
		$query = $Comment->get();
		$data['comment_ids'] = $query->getResultArray();
        return view('Theme/index_view', $data);
	}

	public function index_list($id = false)
	{

		$CategoryModel = new CategoryModel();
		$Category = $CategoryModel;
		$Category->select('*');
		$Category->where('category', $id);
		$query = $Category->get();
		$data['category'] = $query->getResultArray();

		$WebboardModel = new WebboardModel();
		$Webboard = $WebboardModel;
		$Webboard->select('*');
		$Webboard->join('category', 'category.category_id = webboard.category_id');
		$Webboard->where('category.category', $id);
		$Webboard->orderBy('webboard.Webboard_id ', 'DESC');
		$query = $Webboard->get();
		$data['webboards'] = $query->getResultArray();

		return view('Theme/index_list', $data);
	}


}
