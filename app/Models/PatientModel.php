<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'fullname', 'mother_fullname', 'photo', 'birthday',
        'cpf', 'address', 'number', 'complement', 'neighborhood', 'city', 'state', 'cep'];
    protected $dates = ['birthday'];
    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
}