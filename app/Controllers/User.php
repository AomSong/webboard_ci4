<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class User extends BaseController

{
        /**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

    public function login()
	{
		return view('Theme/login');
	}


    public function register()
	{
		return view('Theme/register');
	}
    
    public function login_db()
    {
        
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'user_username' => 'required|min_length[3]|max_length[50]',
                'user_password' => 'required|min_length[3]|max_length[255]|validateUser[user_username,user_password]',
            ];

            $errors = [
                'user_password' => [
                    'validateUser' => "user_username or Password don't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('Theme/login', [
                    "validation" => $this->validator,
                ]);

            } else {
                $model = new UserModel();

                $user = $model->where('user_username', $this->request->getVar('user_username'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);
                // Redirecting to dashboard after login
                return redirect()->to(base_url('mainpage'));

            }
        }
       
    }

    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['user_id'],
            'user_firstname' => $user['user_firstname'],
            'user_lastname' => $user['user_lastname'],
            'user_username' => $user['user_username'],
            'user_password' => $user['user_password'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function register_db()
    {
    
        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'user_firstname' => 'required|min_length[3]|max_length[20]',
                'user_lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
                'user_username' => 'required|min_length[3]|max_length[20]|is_unique[user.user_username]',
                'user_password' => 'required|min_length[3]|max_length[255]',
                'user_password_Confirm' => 'matches[user_password]',
            ];

            if (!$this->validate($rules)) {

                return view('Theme/register', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $newData = [
                    'user_firstname' => $this->request->getVar('user_firstname'),
                    'user_lastname' => $this->request->getVar('user_lastname'),
                    'email' => $this->request->getVar('email'),
                    'user_username' => $this->request->getVar('user_username'),
                    'user_password' => $this->request->getVar('user_password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to(base_url('login'));
            }
        }
       
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}