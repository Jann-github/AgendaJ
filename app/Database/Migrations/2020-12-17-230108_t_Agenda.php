<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TAgenda extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id_contacto'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'id_categoria'       => [
                                'type'           => 'INT',
                                'constraint'     => '5',
						],
						'nombre'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '50',
						],
						'paterno'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
						],
						'materno'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '50',
						],
						'telefono'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '15',
						],
						'email'       => [
							'type'           => 'VARCHAR',
							'constraint'     => '50',
						],
						'fechaInsert'       => [
							'type'           => 'DATE',
							'null'			 => false,
						],
                ]);
                $this->forge->addKey('id_contacto', true);
                $this->forge->createTable('t_agenda');
        }

        public function down()
        {
                $this->forge->dropTable('t_agenda');
        }
}
