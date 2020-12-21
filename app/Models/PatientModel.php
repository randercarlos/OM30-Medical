<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fullname', 'mother_fullname', 'photo', 'birthday', 'cpf', 'cns', 'address', 'number',
        'complement', 'neighborhood', 'city', 'state', 'cep'];
    protected $dates = ['birthday'];
    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    const PAGINATION = 10;

    public function getPatients() {
        return $this->paginate(self::PAGINATION);
    }

    public function getPager() {
        return $this->pager;
    }

    public function deletePatientById($id) {
        if (!empty($id)) {
            return $this->delete(['id' => $id]);
        }

        return null;
    }
}