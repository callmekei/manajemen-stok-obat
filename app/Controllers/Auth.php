<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function register_process()
    {
        if(!$this->validate(
            [
                'user_name' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors'=> [
                        'required'  => '{field} Harus diisi',
                        'min_length'=> '{field} minimal 5 karakter',
                        'max_length'=> '{field} maksimal 20 karakter'
                    ]
                ],
                'user_username' => [
                    'rules' => 'required|min_length[5]|max_length[20]|is_unique[users.user_username]',
                    'errors'=> [
                        'required'  => '{field} Harus diisi',
                        'min_length'=> '{field} minimal 5 karakter',
                        'max_length'=> '{field} maksimal 20 karakter',
                        'is_unique'=> '{field} sudah digunakan'
                    ]
                ],
                'user_email' => [
                    'rules' => 'required|valid_email|max_length[50]',
                    'error' => [
                        'required'  => '{field} Harus diisi',
                        'valid_email'=> 'Email tidak valid',
                        'max_length'=> '{field} Maksimal 50 karakter',
                    ]
                ],
                'user_pass' => [
                    'rules' => 'required|min_length[8]|max_length[60]',
                    'error' => [
                        'required'  => '{field} Harus diisi',
                        'min_length'=> '{field} minimal 8 karakter',
                        'max_length'=> '{field} maksimal 60 karakter',
                    ]
                ],
            ])){
                session()->setFlashdata('error',$this->validator->listErrors());
                return redirect()->back()->withInput();
           }
           $user = new UsersModel();
           $user->insert([
                'user_name' => $this->request->getVar('user_name'),
                'user_username' => $this->request->getVar('user_username'),
                'user_email' => $this->request->getVar('user_email'),
                'user_pass' => password_hash($this->request->getVar('user_pass'),PASSWORD_BCRYPT),
            ]);
            return redirect()->to('/login');
    }

    public function login_process() {
        $user = new UsersModel();
        $username = $this->request->getVar('user_username');
        $pass = $this->request->getVar('user_pass');
        $user = $user->where(['user_username'=>$username])->first();
        if($user){
            if(password_verify($pass,$user['user_pass'])){
                session()->set([
                    'username'=>$user['user_username'],
                    'name'=>$user['user_name'],
                    'logged_in'=>TRUE,
                ]);
                return redirect()->to(base_url('dashboard'));
            }else{
                session()->setFlashdata('error','Username atau Password Salah');
                return redirect()->to(base_url('login'));
                
            }
        }else{
            session()->setFlashdata('error','Username atau Password Salah');
            return redirect()->to(base_url('login'));
        }
    }
    
    public function forgot_password()
    {
        return view('forgot-password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}