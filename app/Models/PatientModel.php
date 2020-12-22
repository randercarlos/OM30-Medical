<?php
namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';
    protected $returnType = '\App\Models\PatientModel';
    protected $allowedFields = ['fullname', 'mother_fullname', 'photo', 'birthday', 'cpf', 'cns', 'address', 'number',
        'complement', 'neighborhood', 'city', 'state', 'cep'];
    protected $dates = ['birthday'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'fullname' => 'required|max_length[250]',
        'mother_fullname' => 'required|max_length[250]',
        'birthday' => 'required|valid_date',
        'cpf' => 'required|CPF|exact_length[14]|is_unique[patients.cpf,id,{id}]',
        'cns' => 'required|CNS|is_unique[patients.cns,id,{id}]',
        'cep' => 'required|exact_length[9]',
        'address' => 'required|max_length[250]',
        'number' => 'required|alpha_numeric_space|max_length[10]',
        'complement' => 'max_length[250]',
        'neighborhood' => 'required|max_length[60]',
        'city' => 'required|max_length[60]',
        'state' => 'required|alpha|exact_length[2]',
        'photo' => 'max_size[photo,64]|max_dims[photo,150,150]|mime_in[photo,image/png,image/jpg,image/gif,image/jpeg]'
    ];
    protected $validationMessages = [
        'fullname' => [
            'required' => 'Nome Completo é obrigatório!',
            'max_length' => 'Nome Completo possui no máximo 250 caracteres!',
        ],
        'mother_fullname' => [
            'required' => 'Nome Completo da Mãe é obrigatório!',
            'max_length' => 'Nome Completo da Mãe possui no máximo 250 caracteres!',
        ],
        'birthday' => [
            'required' => 'Data de Nascimento é obrigatória!',
            'valid_date' => 'Data de Nascimento deve ser uma data válida!',
        ],
        'cpf' => [
            'required' => 'CPF é obrigatório!',
            'CPF' => 'CPF inválido!',
            'exact_length' => 'CPF deve ter 14 caracteres!',
            'is_unique' =>  'Já existe um paciente com o CPF cadastrado!',
        ],
        'cns' => [
            'required' => 'CNS é obrigatório!',
            'CNS' => 'CNS inválido!',
            'is_unique' =>  'Já existe um paciente com o CNS cadastrado!',
        ],
        'cep' => [
            'required' => 'CEP é obrigatório!',
            'exact_length' => 'CEP deve ter 9 caracteres!',
        ],
        'address' => [
            'required' => 'Endereço é obrigatório! Informe o CEP para preenchê-lo!',
            'max_length' => 'Endereço deve ter 250 caracteres no máximo!',
        ],
        'number' => [
            'required' => 'Nº é obrigatório!',
            'alpha_numeric_space' => 'Nº deve ter somente caracteres alfanuméricos ou espaço!',
            'max_length' => 'Nº deve ter 10 caracteres no máximo!',
        ],
        'complement' => [
            'max_length' => 'Complemento deve ter 250 caracteres no máximo!',
        ],
        'neighborhood' => [
            'required' => 'Bairro é obrigatório! Informe o CEP para preenchê-lo!',
            'max_length' => 'Bairro deve ter 60 caracteres no máximo!',
        ],
        'city' => [
            'required' => 'Cidade é obrigatório! Informe o CEP para preenchê-lo!',
            'max_length' => 'Cidade deve ter 60 caracteres no máximo!',
        ],
        'state' => [
            'required' => 'Estado é obrigatório! Informe o CEP para preenchê-lo!',
            'alpha' => 'Estado deve ter somente caracteres alfanuméricos!',
            'exact_length' => 'Estado deve ter exatamente 2 caracteres!',
        ],
        'photo' => [
            'uploaded' => 'Foto inválida!',
            'max_size' => 'A foto deve ter 256kb no máximo!',
            'max_dims' => 'A foto deve ter 150px de largura e 150px de altura no máximo!',
            'mime_in' => 'A foto deve ser do tipo JPG, PNG ou GIF',
        ],

    ];
    const PAGINATION = 10;


    public function getPatients() {
        return $this->orderBy('id', 'ASC')->paginate(self::PAGINATION);
    }

    public function getPatientById($id) {
        return !empty($id) ? $this->find($id) : null;
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

    public function getPhotoFile() {
        if (!empty($this->photo)) {
            $file = base_url('/uploads/patients/' . $this->photo);

            if (!empty($file)) {
                return $file;
            }
        }

        return null;
    }

    public function getFormattedBirthday() {
        if (!empty($this->birthday)) {
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $this->birthday);
            return $date->format('Y-m-d');
        }

        return null;
    }

}