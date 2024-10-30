<?php
/**
 * Widget (NFT)
 *
**/

# Exit if accessed directly
if(!defined("CRYPTONFT_EXEC")){
	die();
}


 /**
  * Add widget NFT
  * 
  * @package Cryptocurrency Nft
  * @author cryptocurrencymarketcapital
  * @version 1.1
  * @access public
  * 
  */
class Nft_Widget extends WP_Widget {

	/**
	 * Option Plugin
	 * @access private
	 **/
	private $options;

	/**
	* Register widget with WordPress.
	*/
	function __construct() {
		parent::__construct(
		"nft", // Base ID
		__("Cryptocurrency NFT","cryptocurrency-nft"), // Name
		array("description" => __("Displays a list of the top NFTs in your sidebar", "cryptocurrency-nft"),) // Args
		);
		$this->options = get_option("cryptocurrency_nft_plugins"); // get current option
	}

	/**
	* Front-end display of widget.
	*
	* @see WP_Widget::widget()
	*
	* @param array $args     Widget arguments.
	* @param array $instance Saved values from database.
	*/
	public function widget( $args, $instance ){
		//TODO: WIDGET OPTION VARIABLE
		/**
		* @var string $instance["title"] - get widget title
		**/
	$url1 = esc_url( 'https://crypto.com/nft' );
	$url2 = esc_url( 'https://ftx.us/nfts' );
	$url3 = esc_url( 'https://opensea.io/' );
	$url4 = esc_url( 'https://decentraland.org/' );
	$url5 = esc_url( 'https://rarible.com/' );
	$url6 = esc_url( 'https://in.nba.com/' );
	$url7 = esc_url( 'https://www.cryptokitties.co/' );
	$url8 = esc_url( 'https://axieinfinity.com/' );

	$linespacing = ( '<br> <hr>' );
		
	$link1 = '#1 <a target="_blank" href="' . ( $url1 ) . '">.' . ( $url1 ) . '</a>'; 
	
	$link2 = '#2 <a target="_blank" href="' . ( $url2 ) . '">.' . ( $url2 ) . '</a>'; 	
		
	$link3 = '#3 <a target="_blank" href="' . ( $url3 ) . '">.' . ( $url3 ) . '</a>'; 	
		
	$link4 = '#4 <a target="_blank" href="' . ( $url4 ) . '">.' . ( $url4 ) . '</a>'; 	
		
	$link5 = '#5 <a target="_blank" href="' . ( $url5 ) . '">.' . ( $url5 ) . '</a>'; 	
		
	$link6 = '#6 <a target="_blank" href="' . ( $url6 ) . '">.' . ( $url6 ) . '</a>'; 	
	$link7 = '#7 <a target="_blank" href="' . ( $url7 ) . '">.' . ( $url7 ) . '</a>'; 	
		
	$link8 = '#8 <a target="_blank" href="' . ( $url8 ) . '">.' . ( $url8 ) . '</a>';	
		
		
		echo wp_kses_post ($args["before_widget"]);
		if (!empty($instance["title"])){
			echo wp_kses_post ($args["before_title"]. apply_filters("widget_title", $instance["title"] ). $args["after_title"]);
			
			
			
			
			
			
		// Displays List Content
		// 
		
		echo wp_kses_post( $link1 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link2 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link3 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link4 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link5 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link6 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link7 );
		
		echo wp_kses_post( "$linespacing" ) ;
			
		echo wp_kses_post( $link8 );
		
		echo wp_kses_post( "$linespacing" ) ;
		
		}
		//Display file path
		if(CRYPTONFT_DEBUG==true){
			$file_info = null; 
			$file_info .= "<div>" ; 
			$file_info .= "<pre style=\"color:rgba(255,0,0,1);padding:3px;margin:0px;background:rgba(255,0,0,0.1);border:1px solid rgba(255,0,0,0.5);font-size:11px;font-family:monospace;white-space:pre-wrap;\">%s:%s</pre>" ; 
			$file_info .= "</div>" ; 
			printf($file_info,__FILE__,__LINE__);
		}
		echo wp_kses_post ($args["after_widget"]);
	}

	/**
	* Back-end widget form.
	*
	* @see WP_Widget::form()
	*
	* @param array $instance Previously saved values from database.
	*/
	public function form( $instance ) {
		// Create Title
		$title = ! empty( $instance["title"] ) ? $instance["title"] : __("Cryptocurrency NFT", "cryptocurrency-nft");
		echo wp_kses_post ("<p>");
		echo wp_kses_post ('<label for="'. $this->get_field_id("title" ).'">'. __("Title:") .'</label>');
		echo '<input class="widefat" id="'.  $this->get_field_id("title") .'" name="'. $this->get_field_name("title").'" type="text" value="' . esc_attr( $title ) . '">';
		echo wp_kses_post ("</p>");
	}

	/**
	* Sanitize widget form values as they are saved.
	*
	* @see WP_Widget::update()
	*
	* @param array $new_instance Values just sent to be saved.
	* @param array $old_instance Previously saved values from database.
	*
	* @return array Updated safe values to be saved.
	*/
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance["title"] = ( ! empty( $new_instance["title"] ) ) ? strip_tags( $new_instance["title"] ) : "";
		
		return $instance;
	}
	
}  
