<?php
/*
Plugin Name: WeCitizens tools
Description: TODO
*/

class We_Citizens_Tools_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(false, $name = __('WeCitizens tools'));
	}

	public function form($instance) {
	    $title = isset($instance['title']) ? $instance['title'] : '';
	    ?>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
	    </p>
	    <?php
	}

	function update() {
	}

 	function widget($args, $instance) {
	    echo $args['before_widget'];
	    // echo $args['before_title'];
	    // echo apply_filters('widget_title', $instance['title']);
	    // echo $args['after_title'];
	    ?>
		<?php if (ICL_LANGUAGE_CODE == 'fr') echo '
	        <h2 class="widget-title">Nos outils</h2>
	        <ul class="widget_we">
	        	<li class="widget_we"><a target="_blank" href="http://directory.wecitizens.be/fr/"><button class="widget_button_we">Répertoire Politique</button></a> </li>
	        	<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2/elections-2014/"><button class="widget_button_we">GPS électoral</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2-3/liste-des-campagnes/"><button class="widget_button_we">Outil de campagne</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2-3/sondage-des-acteurs-politiques/"><button class="widget_button_we">Sondage des acteurs politiques</button></a> </li>
	        </ul>'; ?>
		<?php if (ICL_LANGUAGE_CODE == 'nl') echo '
	        <h2 class="widget-title">Onze tools</h2>
	        <ul class="widget_we">
	        	<li class="widget_we"><a target="_blank" href="http://directory.wecitizens.be/nl/"><button class="widget_button_we">Politieke Databank</button></a> </li>
	        	<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/nl/onze-tools/kieswijzer/"><button class="widget_button_we">Kieswijzer</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/nl/onze-tools/campagneslijst/"><button class="widget_button_we">Campagne tool</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/nl/onze-tools/peiling-van-de-politici/"><button class="widget_button_we">Peiling van de politic</button></a> </li>
			</ul>'; ?>
		<?php if (ICL_LANGUAGE_CODE == 'en') echo '
	        <h2 class="widget-title">Our tools</h2>
	        <ul class="widget_we">
	        	<li class="widget_we"><a target="_blank" href="http://directory.wecitizens.be/fr/"><button class="widget_button_we">Political directory</button></a> </li>
	        	<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2/elections-2014/"><button class="widget_button_we">GPS electoral</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2-3/liste-des-campagnes/"><button class="widget_button_we">Outil de campagne</button></a> </li>
				<li class="widget_we"><a target="_blank" href="'.esc_url( get_site_url() ).'/fr/outils-2-3/sondage-des-acteurs-politiques/"><button class="widget_button_we">Sondage des acteurs politiques</button></a> </li>
			</ul>'; ?>
	    <?php
	    echo $args['after_widget'];
	}
}

add_action('widgets_init', function(){
	register_widget('We_Citizens_Tools_Widget');
})
?>
