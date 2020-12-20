<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePatientsTable extends Migration
{
	public function up()
	{
        $this->forge->addPrimaryKey('id');
        $this->forge->addField([
            'fullname' => ['type' => 'VARCHAR','constraint' => 255],
            'mother_fullname' => ['type' => 'VARCHAR','constraint' => 255],
            'photo' => ['type' => 'VARCHAR','constraint' => 255, 'null' => true],
            'birthday' => ['type' => 'DATETIME'],
            'cpf' => ['type' => 'VARCHAR', 'constraint' => 14],
            'address' => ['type' => 'VARCHAR', 'constraint' => 255],
            'number' => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'complement' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'neighborhood' => ['type' => 'VARCHAR', 'constraint' => 60],
            'city' => ['type' => 'VARCHAR', 'constraint' => 60],
            'state' => ['type' => 'VARCHAR', 'constraint' => 60],
            'cep' => ['type' => 'VARCHAR', 'constraint' => 9],
            'created_at' => ['type' => 'DATETIME', 'default' => 'NOW()'],
            'updated_at' => ['type' => 'DATETIME', 'null' => true, 'on update' => 'NOW()'],
        ]);
        $this->forge->createTable('patients');
	}

	//--------------------------------------------------------------------

	public function down()
	{
        $this->forge->dropTable('patients');
	}
}
