<?php

/**

Plugin Name: Cryptocurrency NFT 
Plugin URI: https://howtocreateapressrelease.com/cryptocurrency-nft-wordpress-plugin/ 
Description: Displays a list of cryptocurrency NFT sites in your WordPress sidebar or any widget area of your wordpress blog.
Version: 1.1 
Author: How To Create A Press Release
Author URI: https://howtocreateapressrelease.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Displays a list of cryptocurrency NFT sites in your WordPress sidebar or any widget area of your wordpress blog.

**/

# Exit if accessed directly
if (!defined("ABSPATH"))
{
	exit;
}

# Constant

/**
 * Exec Mode
 **/
define("CRYPTONFT_EXEC",true);

/**
 * Plugin Base File
 **/
define("CRYPTONFT_PATH",dirname(__FILE__));

/**
 * Plugin Base Directory
 **/
define("CRYPTONFT_DIR",basename(CRYPTONFT_PATH));

/**
 * Plugin Base URL
 **/
define("CRYPTONFT_URL",plugins_url("/",__FILE__));

/**
 * Plugin Version
 **/
define("CRYPTONFT_VERSION","1.1"); 

/**
 * Debug Mode
 **/
define("CRYPTONFT_DEBUG",false);  //change false for distribution



/**
 * Base Class Plugin
 * @author cryptocurrencymarketcapital
 *
 * @access public
 * @version 1.1
 * @package Cryptocurrency Nft
 *
 **/

class CryptocurrencyNft
{

	/**
	 * Instance of a class
	 * @access public
	 * @return void
	 **/

	function __construct()
	{
		add_action("widgets_init", array($this, "cryptonft_widget_nft_init")); //init widget
		add_action("after_setup_theme", array($this, "cryptonft_image_size")); // register image size.
		add_filter("image_size_names_choose", array($this, "cryptonft_image_sizes_choose")); // image size choose.
		add_action("init", array($this, "cryptonft_register_taxonomy")); // register register_taxonomy.
		
	}


	


	/**
	 * Register new widget (nft)
	 *
	 * @access public
	 * @return void
	 **/
	public function cryptonft_widget_nft_init()
	{
		if(file_exists(CRYPTONFT_PATH . "/includes/widget.nft.inc.php")){
			require_once(CRYPTONFT_PATH . "/includes/widget.nft.inc.php");
			register_widget("Nft_Widget");
		}
	}


	/**
	 * Register a new image size.
	 * @link http://codex.wordpress.org/Function_Reference/add_image_size
	 * @access public
	 * @return void
	 **/
	public function cryptonft_image_size()
	{
	}


	/**
	 * Choose a image size.
	 * @access public
	 * @param mixed $sizes
	 * @return void
	 **/
	public function cryptonft_image_sizes_choose($sizes)
	{
		$custom_sizes = array(
		);
		return array_merge($sizes,$custom_sizes);
	}




	
}


new CryptocurrencyNft();

