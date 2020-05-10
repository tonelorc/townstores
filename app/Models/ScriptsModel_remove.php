<?php namespace App\Models;

use CodeIgniter\Model;

class ScriptsModel extends Model
{
	protected $qty;

	function __construct() {
		$qty= 0;
	}

	/**
	 * Quantity of registers
	 * @author Toni Rodriguez Carrasco
	 * @version 0.1
	 */
	function getQty() {
		return $qty;
	}

	/**
	 * Create new log
	 * @author Toni Rodriguez Carrasco
	 * @version 0.1
	 * @param return last feeds
	 */
	function newLog()	{
		$db = db_connect();

		// Data to insert
		$data = array(
			'id' => null,
			'date' => date("Y-m-d h:i:s"),
			'numfeeds' => 0,
			'status' => 1
		);

		// Insert sentence
		$db->insert('log_update_script', $data);

		if ( $db->affected_rows() > 0 ){
			return $db->insert_id();
		} else {
			return false;
		}
	}

	/**
	 * Get feeds added
	 * @author Toni Rodriguez Carrasco
	 * @version 0.1
	 * @param return last feeds
	 */
	function getFeeds( $qtyfeeds=100 )	{
		$db = db_connect();

		$sql= "SELECT * FROM feeds WHERE enabled=1 ORDER BY dateadded DESC LIMIT ". $qtyfeeds;

		$query= $db->query($sql);
		$qty= $db->affectedRows();

		if ( $db->affectedRows() > 0 ){
			return $query->getResultArray();
		} else {
			return false;
		}
	}

	/**
	 * Read last feeds update log
	 * @author Toni Rodriguez Carrasco
	 * @version 0.1
	 * @param return last update date
	 */
	function getLastUpdate()	{
		$db = db_connect();

		$sql= "SELECT date FROM log_update_script ORDER BY id DESC LIMIT 2";
		$query= $db->query($sql);

		if ( $db->affectedRows() > 0 ){
			$lasttwolog= $query->getResultArray();
			return $lasttwolog[1]["date"];
		} else {
			return false;
		}
	}

	/**
	 * Save news from feed
	 * @author Toni Rodriguez Carrasco
	 * @version 0.1
	 * @param return most viewed news
	 */
	function saveNews( $log, $hilo, $news, $lastupdate )	{
		$db = db_connect();

		// For each news save
		foreach ( $news as $new ){
			$datepublished= date("Y-m-d h:i:s", strtotime($new["pubDate"]));
			// Save new if it had creted today
			if ( $datepublished >= $lastupdate ){
				// Clean the text
				$textnew= substr(strip_tags($new["description"]), 0, 255);
				$titlenew= substr(strip_tags($new["title"]), 0, 255);

				$data = array(
					'idnew' => null,
					'feed_ID' => intval($hilo["idfeed"]),
					'log_ID' => $log,
					'title' => $titlenew,
					'text' => $textnew,
					'link' => $new["link"],
					'added' => $datepublished,
					'visited' => 0,
					'enabled' => 1
				);

				$db->insert('news', $data);
			}
		}
	}
}
?>
