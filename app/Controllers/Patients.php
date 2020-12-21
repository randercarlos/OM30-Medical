<?php

namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\RESTful\ResourcePresenter;

class Patients extends ResourcePresenter
{
    protected $modelName = 'App\Models\PatientModel';

    public function index()
    {
        $patient = new PatientModel();
        $data = [
            'patients'  => $patient->getPatients(),
            'pager'  => $patient->getPager(),
            'title' => 'Listagem de Pacientes',
        ];

        echo view('patients/index', $data);
    }

    public function new() {}

    public function create() {

        $model = new NewsModel();
        $isValidated = $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body'  => 'required'
        ]);

        if ($this->request->getMethod() === 'post' && $isValidated) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
                'body'  => $this->request->getPost('body'),
            ]);

            $data['title'] = $this->request->getPost('title');
            echo view('news/success', $data);
        }
        else
        {
            echo view('templates/header', ['title' => 'Create a news item']);
            echo view('news/create');
            echo view('templates/footer');
        }
    }

    public function show($id = null) {}
    public function edit($id = null) {}
    public function update($id = null) {}
    public function delete($id = null) {
        if (!empty($id)) {
            $patient = new PatientModel();
            $session = session();

            if ($patient->deletePatientById($id)) {
                $session->setFlashdata('success', "Paciente foi removido com sucesso!");
                return redirect()->to('/patients');
            }
        }
    }



}