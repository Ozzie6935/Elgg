<?php

	/**
	 * Elgg index page for web-based applications
	 * 
	 * @package Elgg
	 * @subpackage Core
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Curverider Ltd
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.org/
	 */

	/**
	 * Start the Elgg engine
	 */
		require_once(dirname(__FILE__) . "/engine/start.php");

	/**
	 * Load the front page
	 */
		echo page_draw(null, elgg_view("homepage"));

		get_objects(3,"blog","mammals","are lovely", 7, 2, 1);
		
		$obj = new stdClass;
		$obj->id = 3;
		
		
		
		
		// Testing ///////
	if ($_SESSION['id']==-1) $_SESSION['id'] = 1;
	
		// Create / load a site
		$site = get_site(1);
error_log("GETTIGN SITE " . print_r($site, true));		

		if (empty($site))
		{
			$site = new ElggSite();
			
			$site->title = "Test title";
			$site->description = "Test description";
			$site->url = "http://dushka/~icewing/Workingdirectory/elggnew/";
			$site->owner_id = 1;
			$site->access_id = 0;
			
			error_log("LOADED NEW SITE: Saving" . print_r($site,true));
			
			$site->save();
		}
		else
		{
			$site = new ElggSite($site);

			$site->title = "Test title " . time();
			$site->save();
			
			error_log("UPDATING SITE " . print_r($site, true));	
		}
		
		

		// annotate site
		$site->annotate("Test","TestValue");
		
		// add meta data
		$site->setMetadata("Metaname", "Value");




		// change site metadata
		$site->setMetadata("Metaname", "Value2");

		


		// get site annotations
		error_log("SITE Annotations : " . print_r($site->getAnnotations("Test"), true));
		
		
		// get site metadata
		error_log("SITE Metadata : " . print_r($site->getMetadata("Metaname"), true));
		
		
?>