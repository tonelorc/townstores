<?php
namespace App\Controllers;

/**
 * Class Install
 *
 * Install ejecuta el proceso de instalación de la base de datos
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class Install extends Controller
{

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

	/*
	 * Install DataBase
	 */
	public function installDB(){
		
	}

}
