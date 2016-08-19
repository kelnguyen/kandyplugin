<?php
    /* 
    Plugin Name: Kandy Plugin
    Plugin URI: http://sheridanc.on.ca/
    Description: Assignment 2 Plugin
    Author: Kelly Nguyen
    Author URL: http://phoenix.sheridanc.on.ca/~ccit3665
    Version: 1.0
    */

// Enqueuing a stylesheet

function pluginstyles() {
    wp_enqueue_style('plugin-styles', plugins_url('/CSS/style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'pluginstyles');

// Creating a Widget - Trying Yearly Archives


class kandywidget extends WP_Widget {
    // Initializing the widget
    public function __construct() {
        $widget_ops = array(
            'classname' => 'kandywidget',
            'description' => __( 'Displaying posts from a custom post type: Fun Facts', 'kandy'));
        
    // Adding a class to the widget that provides a description of what the widget does - shows up in WordPress dashboard
        parent::__construct('kandy_posts', __('Fun Facts', 'kandy'), $widget_ops);
    }
    
    // Determining what is going to appear on the site
    public function widget( $args, $instance ) {
        
        // Displays a title provided by the user and shows a default title otherwise
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Fun Facts', 'kandy') : $instance['title'], $instance, $this->id_base);
        
        echo $args['before_widget']; // What is set up when you registered the sidebar
        
        if ( $title ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
?>
    
        <ul>
        <?php
            echo do_shortcode('[kandyshortcode]');
        ?>
        </ul>

<?php
        echo $args['after_widget']; // What is set up when you registered the sidebar
        
        }
    
    // Sets up the form for users to select their options and add content in the widget admin page - WordPress dashboard
    public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = strip_tags($instance['title']);
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'kandy'); ?></label>
            
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

<?php }
    
        
    // Sanitizes, saves, and submits user-generated content
    public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'title' => '') );
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}
}
        
    // Tells WordPress that this widget has been created and that it should display in the list of available widgets in the WordPress dashboard in admin settings
        
    add_action( 'widgets_init', function() {
       register_widget( 'kandywidget' ); 
    });

// Custom post type for facts about me

add_action( 'init', 'create_post_type');
function create_post_type() {
    register_post_type( 'kandy_posts',
        array(
            'labels' => array(
            'name' => __( 'Facts' ),
            'singular_name' => __( 'Fact' )
            ),
            'public' => true,
            'has_archive' => true,
                'supports' => ['title', 'editor', 'thumbnail'] // Necessary because it does not appear for the custom post types
        )
    );
}

// Kandy shortcode - make it so it will show the custom post type on a page
        
add_shortcode( 'kandyshortcode', 'kandy_custom_post_type' );
        
function kandy_custom_post_type() {
    $args = array(
        'post_type' => 'kandy_posts',
        'posts_per_page' => 12); // Lower count if adding in next and previous navigation buttons
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(
        );
    // Includes what the post type is going to display
        the_title();
    echo '<div class="entry-content">';
        the_content();
        the_post_thumbnail();
    echo '</div';
endwhile;
    // NTS: 'category_name' = 'photography' 
}    
