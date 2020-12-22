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

    public function new() {
        helper('form');
        helper('misc_utils');

        $data = [
            'title' => 'Novo Paciente',
            'states' => getUF()
        ];

        return view('patients/form', $data);
    }

    public function create() {
        $model = new PatientModel();
        $data = $this->request->getPost(null);
        $data['photo'] = $this->request->getFile('photo');

        if ($this->request->getMethod() === 'post' && $model->validate($data)) {
            $session = session();
            $upload = $this->request->getFile('photo');

            if (!empty($upload) && $upload->isValid() && !$upload->hasMoved()) {
                $data['photo'] = $upload->getRandomName();

                if (!$upload->move(FCPATH . 'uploads/patients', $data['photo'])) {
                    throw new \Exception("Falha ao fazer upload da foto!");
                }
            }

            if (!$model->skipValidation()->save($data)) {
                throw new \Exception("Falha ao criar paciente!");
            }

            $session->setFlashdata('success', "Paciente <b>{$data['fullname']}</b> foi criado com sucesso!");
            return redirect()->to('/patients');
        }

        return redirect()->back()->with('errors', $model->errors())->withInput();
    }

    public function show($id = null) {
        helper('form');
        helper('misc_utils');

        $model = new PatientModel();

        $data = [
            'patient' => $model->getPatientById($id),
            'title' => 'Visualizar Paciente',
            'states' => getUF(),
            'mode' => 'disabled'
        ];

        return view('patients/form', $data);
    }

    public function edit($id = null) {
        helper('form');
        helper('misc_utils');

        $model = new PatientModel();

        $data = [
            'patient' => $model->getPatientById($id),
            'title' => 'Editar Paciente',
            'states' => getUF()
        ];

        return view('patients/form', $data);
    }
    public function update($id = null) {
        helper('misc_utils');

        $model = (new PatientModel())->getPatientById($id);
        $data = $this->request->getPost(null);
        $upload = $data['photo'] = $this->request->getFile('photo');

        if ($this->request->getMethod() === 'post' && $model->validate($data)) {
            $session = session();

            if (!empty($upload) && $upload->isValid() && !$upload->hasMoved()) {

                $data['photo'] = $upload->getRandomName();

                if (!$upload->move(FCPATH . 'uploads/patients', $data['photo'])) {
                    throw new \Exception("Falha ao fazer upload da foto!");
                }

                // delete the old photo
                deletePhoto(FCPATH . 'uploads/patients/' . $model->photo);
            }

            if (!$model->skipValidation()->update($id, $data)) {
                throw new \Exception("Falha ao atualizar paciente!");
            }

            $session->setFlashdata('success', "Paciente <b>{$data['fullname']}</b> foi atualizado com sucesso!");
            return redirect()->to('/patients');
        }

        return redirect()->back()->with('errors', $model->errors())->withInput();
    }

    public function delete($id = null) {
        helper('misc_utils');

        if (!empty($id)) {
            $model = new PatientModel();
            $session = session();

            // delete the old photo
            deletePhoto(FCPATH . 'uploads/patients/' . $model->getPatientById($id)->photo);

            if ($model->deletePatientById($id)) {
                $session->setFlashdata('success', "Paciente foi removido com sucesso!");

                return redirect()->to('/patients');
            }
        }
    }



}