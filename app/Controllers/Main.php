<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\CmsConfig;

class Main extends Controller
{
	protected $cms_config;
	protected $app_key;

	public function __construct()
	{
		$this->cms_config = new CmsConfig();
		$this->app_key = $this->cms_config->app_key;
	}

	public function index()
	{
		// var_dump( $this->app_key );
		$data['jobs'] = $this->get_all_jobs();

		return view('home', $data);
	}

	public function new_job()
	{
		return view( 'new_job' );
	}

	public function cadastrar()
	{
		if ( ! $_SERVER['REQUEST_METHOD'] == "POST" ) {
			return redirect( site_url( 'main' ) );
		}

		// save
		$params = [
			'job' => $this->request->getPost( 'job_name' )
		];

		$db = db_connect();
		$db->query( "INSERT INTO `jobs` (`job`, `created_at`) VALUES (:job:, NOW())", $params );
		$db->close();

		return redirect()->to( site_url( 'main' ) );
	}

	private function get_all_jobs()
	{
		$db = db_connect();
		$dados = $db->query("SELECT * FROM `jobs`")->getResultArray();
		$db->close();

		return $dados;
	}

	public function jobdone( $id = 0 )
	{
		$db = db_connect();
		$params = [ 'id' => $id ];
		$db->query( "UPDATE `jobs` SET `finished_at` = NOW(), `updated_at` = NOW() WHERE `id` = :id: LIMIT 1", $params );
		$db->close();

		return redirect()->to( site_url( 'main' ) );
	}

	public function edit_job( $id = 0 )
	{
		$db = db_connect();
		$params = [ 'id' => $id ];
		$dados = $db->query( "SELECT * FROM `jobs` WHERE `id` = :id: LIMIT 1", $params )->getResultArray();
		$db->close();

		$data['job'] = $dados[0];

		return view( 'edit_job', $data );
	}

	public function editar()
	{
		if ( ! $_SERVER['REQUEST_METHOD'] == 'POST' )
		{
			return redirect()->to( site_url( 'main' ) );
		}

		$params = [
			'id' => $this->request->getPost('job_id'),
			'job' => $this->request->getPost('job_name')
		];

		$db = db_connect();
		$db->query( "UPDATE `jobs` SET `job` = :job:, `updated_at` = NOW() WHERE `id` = :id: LIMIT 1", $params );
		$db->close();

		return redirect()->to( site_url( 'main' ) );
	}

	public function deletejob( $id = 0 )
	{
		$db = db_connect();
		$params = [ 'id' => $id ];
		$data['job'] = $db->query( "SELECT * FROM `jobs` WHERE `id` = :id: LIMIT 1", $params )->getResultArray()[0];
		$db->close();

		return view( 'delete_job', $data );
	}

	public function deletejobconfirm( $id = 0 )
	{
		$db = db_connect();
		$params = [ 'id' => $id ];
		$db->query( "DELETE FROM `jobs` WHERE `id` = :id: LIMIT 1", $params );
		$db->close();

		return redirect()->to( site_url( 'main' ) );
	}
}