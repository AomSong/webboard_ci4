<?php

namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\CategoryModel;
use App\Models\WebboardModel;

class Webboard extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var HTTP\IncomingRequest
     */
    protected $request;

    public function webboard_list()
    {
        $data = [];
        $CategoryModel = new CategoryModel();
        $data['categorys'] = $CategoryModel->orderBy('category_id ', 'DESC')->findAll();
        return view('Theme/webboard_list', $data);
    }


    public function webboard_add_db()
    {

        $WebboardModel = new WebboardModel();

        $newData = [
            'category_id' => $this->request->getVar('category_id'),
            'user_id' => $this->request->getVar('user_id'),
            'user_firstname' => $this->request->getVar('user_firstname'),
            'topic' => $this->request->getVar('topic'),
            'webboard' => $this->request->getVar('webboard'),
        ];
        $WebboardModel->save($newData);

        session()->setFlashdata('success', 'บันทึกสำเร็จ');
        return redirect()->to(base_url('profile'));
    }
}
