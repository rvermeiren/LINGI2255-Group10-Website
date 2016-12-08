<?php

add_theme_support('post-thumbnails'); 

if ( function_exists('register_sidebar') )
    register_sidebars(2, array(
        'before_widget' => '<section class="widget">',
        'after_widget' => '</section>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
));

add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'quote',
		array(
			'labels' => array('name' => __( 'Quotes' ), 'singular_name' => __( 'Quote' )),
			'public' => true,
			'has_archive' => true,
			'supports' => array('editor','thumbnail')
        )
	);
}

add_action( 'add_meta_boxes', 'quote_meta_box_add' );  
function quote_meta_box_add()  
{  
    add_meta_box('quote_meta_name', 'Nom de la personne', 'quote_meta_box_name', 'quote', 'normal', 'high');
	add_meta_box('quote_meta_function', 'Fonction de la personne', 'quote_meta_box_function', 'quote', 'normal', 'high');
}  

function quote_meta_box_name($post)  
{  
	$values = get_post_custom( $post->ID );  
	$name = isset($values['quote_meta_box_name'] ) ? esc_attr( $values['quote_meta_box_name'][0] ) : '';  
	
    ?>  
		<input type="text" name="quote_meta_box_name" id="quote_meta_box_name" value="<?php echo $name; ?>" />  
    <?php          
}

function quote_meta_box_function($post)  
{  
	$values = get_post_custom( $post->ID );  
	$function = isset($values['quote_meta_box_function'] ) ? esc_attr( $values['quote_meta_box_function'][0] ) : '';  
	
    ?>  
		<input type="text" name="quote_meta_box_function" id="quote_meta_box_function" value="<?php echo $function; ?>" />  
    <?php          
}

add_action('save_post','quote_meta_box_save');  
function quote_meta_box_save($post_id)  
{  
    // now we can actually save the data  
    $allowed = array(   
        'a' => array( // on allow a tags  
            'href' => array() // and those anchors can only have href attribute  
        )  
    );  
	// Make sure your data is set before trying to save it  
	if( isset( $_POST['quote_meta_box_name'] ) )  
	update_post_meta( $post_id, 'quote_meta_box_name', wp_kses( $_POST['quote_meta_box_name'], $allowed ) ); 

	if( isset( $_POST['quote_meta_box_function'] ) )  
	update_post_meta( $post_id, 'quote_meta_box_function', wp_kses( $_POST['quote_meta_box_function'], $allowed ) );
}     

add_filter( 'manage_edit-quote_columns', 'edit_quote_columns' ) ;
function edit_quote_columns($columns) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'name' => __( 'Auteur' ),
		'function' => __( 'Fonction' ),
		'date' => __( 'Date' )
	);

	return $columns;
}

add_action( 'manage_quote_posts_custom_column', 'manage_quote_columns', 10, 2 );

function manage_quote_columns($column, $post_id) {
	global $post;
	
	$url = add_query_arg(array('post_type' => $post->post_type), 'edit.php');

	switch($column) {

		/* If displaying the 'duration' column. */
		case 'name' :

			/* Get the post meta. */
			$name = get_post_meta( $post_id, 'quote_meta_box_name', true );

			/* If no duration is found, output a default message. */
			if ( empty( $name ) )
				echo __( 'Non précisé' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo '<a href="post.php?post='.$post_id.'&action=edit" title="Edit this quote">'.$name.'</a>';
				

			break;

		/* If displaying the 'genre' column. */
		case 'function' :

			/* Get the post meta. */
			$function = get_post_meta( $post_id, 'quote_meta_box_function', true );

			/* If no duration is found, output a default message. */
			if ( empty( $function ) )
				echo __( 'Non précisé' );

			/* If there is a duration, append 'minutes' to the text string. */
			else
				echo $function;

			break;


		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}

?>