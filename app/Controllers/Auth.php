<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        if (session()->get('__USER__LOGGED__')){
            return redirect()->to('/patients');
        }

        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if ($email === 'admin@admin.com' && $password === 'admin'){
            $ses_data = [
                '__USER__ID__'       => 1,
                '__USER__NAME__'     => 'Administrador',
                '__USER__EMAIL__'    => 'admin@admin.com',
                '__USER__LOGGED__'     => true
            ];
            $session->set($ses_data);

            return redirect()->to('/patients');
        }

        $session->setFlashdata('error', 'Email ou senha inválidos!');
        return redirect()->to('/login');
    }

    public function logout() {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}