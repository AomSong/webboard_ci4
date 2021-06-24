<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\WebboardModel;
use App\Models\CommentModel;

class Mainpage extends Controller
{

	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;
	public function index()
	{

		$model = new UserModel();
		$user = $model->where('user_id', session()->get('user_id'))->first();

		$CategoryModel = new CategoryModel();
		$data['categorys'] = $CategoryModel->orderBy('category_id ', 'DESC')->findAll();

		// $WebboardModel = new WebboardModel();
		// $data['webboards'] = $WebboardModel->orderBy('Webboard_id ', 'DESC')->limit(4)->orWhereNotIn('user_id', $user)->find();

		$WebboardModel = new WebboardModel();
		$builder = $WebboardModel;
		$builder->select('*');
		$builder->join('category', 'category.category_id = webboard.category_id');
		$builder->limit(4);
		$builder->orWhereNotIn('user_id', $user);
		$builder->orderBy('webboard.Webboard_id ', 'DESC');
		$query = $builder->get();
		$data['webboards'] = $query->getResultArray();

		return view('Theme/mainpage', $data);
	}

	public function mainpage_list($id = false)
	{

		$model = new UserModel();
		$user = $model->where('user_id', session()->get('user_id'))->first();

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
		$Webboard->join('user', 'user.user_id = webboard.user_id');
		$Webboard->orWhereNotIn('webboard.user_id', $user);
		$Webboard->where('category.category', $id);
		$Webboard->orderBy('webboard.Webboard_id ', 'DESC');
		$query = $Webboard->get();
		$data['webboards'] = $query->getResultArray();

		return view('Theme/mainpage_list', $data);
	}

	public function mainpage_view($id = null)
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

	
		return view('Theme/mainpage_view', $data);
	}

	public function comment_add_db()
	{

		$CommentModel = new CommentModel();
		$id = $this->request->getVar('webboard_id');
		$newData = [
			'webboard_id' => $this->request->getVar('webboard_id'),
			'user_id' => $this->request->getVar('user_id'),
			'comment' => $this->request->getVar('comment'),
		];
		$CommentModel->save($newData);

		$CommentModel = new CommentModel();
		$Comment = $CommentModel;
		$Comment->where('comment.webboard_id', $id);
		$query = $Comment->get();
		$Count = $query->getNumRows();
	
		$WebboardModel = new WebboardModel();
		$data = [
			'num_comment' => $this->request = $Count,
		];
		$WebboardModel->update($id, $data);

		?>
		<script type="text/javascript">
			alert("เพิ่มข้อมูลสำเร็จ");
			location.href = "<?php echo base_url('mainpage_view/' . $id); ?>";
		</script>
		<?php
	}
}



