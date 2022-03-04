<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobsAddUpdatedAt extends Migration
{
    public function up()
    {
        $fields = [
            'updated_at' => [
                'type' => 'datetime',
                'null' => TRUE
            ]
        ];

        $this->forge->addColumn( 'jobs', $fields );
    }

    public function down()
    {
        $this->forge->dropColumn( 'jobs', 'updated_at' );
    }
}
