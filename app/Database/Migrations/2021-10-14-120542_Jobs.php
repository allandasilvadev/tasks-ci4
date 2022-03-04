<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Jobs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 12,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'job' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => FALSE,
                'default' => ''
            ],
            'created_at datetime not null default current_timestamp',
            'finished_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey( 'id', TRUE );
        $this->forge->createTable( 'jobs' );
    }

    public function down()
    {
        $this->forge->dropTable( 'jobs' );
    }
}
