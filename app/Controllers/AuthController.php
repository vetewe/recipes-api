<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'username' => 'required|min_length[3]|is_unique[users.username]',
                'email'    => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'matches[password]'
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();

                $newData = [
                    'username' => $this->request->getPost('username'),
                    'email'    => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];

                $userModel->registerUser($newData);
                return redirect()->to('/login')->with('success', 'Registration successful. You can now log in.');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('register', $data);
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ];

            if ($this->validate($rules)) {
                $userModel = new UserModel();
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $user = $userModel->loginUser($email, $password);

                if ($user) {
                    session()->set([
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'isLoggedIn' => true,
                    ]);

                    return redirect()->to('/dashboard');
                } else {
                    $data['error'] = 'Email or password is incorrect.';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
