<?php namespace App\Controllers;

use App\Models\ScriptsModel;
use CodeIgniter\Controller;
use App\Libraries\Rssparser;


class Scripts extends BaseController {

	private $numfeeds;
	private $numnews;

	function __construct() {
		// Variables
		$numfeeds= 100;
		$numnews= 25;
	}

	public function dailyUpdate()	{
		$scripts_model = new ScriptsModel();
		$scripts_rssparser = new Rssparser();
		$scripts_config = config('TwonStoresConfig');

		$news= array();
		// Create new log
		$log= $scripts_model->newLog();

		// We read list of feeds
		$feeds= $scripts_model->getFeeds($numfeeds);

		// Last update date
		$lastupdate= $scripts_model->getLastUpdate();

		foreach ($feeds as $hilo){
			$scripts_rssparser->set_feed_url($hilo["feed"]);
			// Read news from feed url
			$news= $scripts_rssparser->getFeed($numnews);
			// Save news from Feed
			$scripts_model->saveNews($log, $hilo, $news, $lastupdate);
		}

		// View
		$data["message"]= "Last update: ". $lastupdate;

		echo view('scripts', $data);
	}
}
