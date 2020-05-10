<?php namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\EntityModel;
use CodeIgniter\Controller;
use App\Libraries\Rssparser;

/**
 * Class Home
 *
 * @package App\Libraries
 */
class Home extends BaseController
{

	/**
	* index ()
	* -------------------------------------------------------------------
	* Class index
	*/

	public function index()
	{
		$home_model = new HomeModel();
		$entity_model = new EntityModel();
		$home_rssparser = new Rssparser();

		$data = [
			'entities'  => $entity_model->getEntity(),
			'testos'  => $home_model->findAll(),
			'variable' => 'Funciona'
		];

		echo view('template_header');
		echo view('welcome_message', $data);
		echo view('template_footer');
	}

}

/**
 * -----------------------------------------------------------------------
 * Filename: Home.php
 * Location: ./app/Controllers/Home.php
 * -----------------------------------------------------------------------
 */
