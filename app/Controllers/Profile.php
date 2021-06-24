<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\WebboardModel;

class Profile extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function profile()
    {
        $data = [];
        $model = new UserModel();
        $data['user'] = $model->where('user_id', session()->get('user_id'))->first();


        $user = $model->where('user_id', session()->get('user_id'))->first();
        $WebboardModel = new WebboardModel();
        $Webboard = $WebboardModel;
        $Webboard->select('*');
        $Webboard->join('category', 'category.category_id = webboard.category_id');
        $Webboard->where('webboard.user_id', $user['user_id']);
        $query = $Webboard->get();
        $data['webboards'] = $query->getResultArray();

        return view('Theme/profile', $data);
    }

  

    public function user_edit_db()
    {
        $model = new UserModel();
        $id = $this->request->getVar('user_id');
        $data = [
            'user_firstname' => $this->request->getVar('user_firstname'),
            'user_lastname' => $this->request->getVar('user_lastname'),
            'email' => $this->request->getVar('email'),
            'user_username' => $this->request->getVar('user_username')
        ];
        $model->update($id, $data);
        session()->setFlashdata('success', 'แก่ไขสำเร็จ');
        return $this->response->redirect(base_url('profile'));
    }


  

    public function password_edit_db()
    {
        $id = $this->request->getVar('user_id');

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'user_password' => 'required|min_length[3]|max_length[255]',
                'user_password_Confirm' => 'matches[user_password]',
            ];

            if (!$this->validate($rules)) {

                $session = session();
                $session->setFlashdata('edit', 'รหัสไม่ตรงกัน กรุณาใส่ใหม่!!');
                return redirect()->to(base_url('profile'));
            } else {
                $model = new UserModel();
                $id = $this->request->getVar('user_id');
                $data = [
                    'user_password' => $this->request->getVar('user_password')
                ];
                $model->update($id, $data);
                session()->setFlashdata('success', 'แก่ไขสำเร็จ');
                return $this->response->redirect(base_url('profile'));
            }
        }
    }

    public function webboard_edil_db()
    {
        $WebboardModel = new WebboardModel();
        $id = $this->request->getVar('webboard_id');
        $data = [
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => $this->request->getVar('user_id'),
            'user_firstname' => $this->request->getVar('user_firstname'),
            'topic' => $this->request->getVar('topic'),
            'webboard' => $this->request->getVar('webboard'),
        ];
        $WebboardModel->update($id, $data);
        session()->setFlashdata('success', 'แก่ไขสำเร็จ');
        return $this->response->redirect(base_url('profile'));
    }

    public function Webboard_delete($id = null)
    {
        $WebboardModel = new WebboardModel();
        $WebboardModel->where('webboard_id', $id)->delete($id);
        session()->setFlashdata('success', 'ลบสำเร็จ');
        return $this->response->redirect(base_url('profile'));
    }



    public function image_edil_db()
    {
        $UserModel = new UserModel();
        $id = $this->request->getPost('user_id');
        $User = $UserModel->find($id);
        $old_img_name = $User['user_image'];

        $file = $this->request->getFile('user_image');
        if ($file->isValid() && ! $file->hasMoved())
		{
			
			if(file_exists("user/".$old_img_name)){
				unlink("user/".$old_img_name);
			}
			$imageName = $file->getRandomName();
			$file->move('user/', $imageName);
			
		}
		else{
			$imageName = $old_img_name;
		}

		$data = [
			'user_image' => $imageName,
        ];

		$UserModel->update($id ,$data);
        session()->setFlashdata('success', 'แก้ไขสำเร็จ');
        return $this->response->redirect(base_url('profile'));
    
    }

    
}
