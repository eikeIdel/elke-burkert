<?php
//LOAD FILES
function portfolio_files(){
    wp_enqueue_script('jquery');
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_style('main-styles',get_stylesheet_uri());
}
//tells workpress which function should be invoked on initial load
add_action( 'wp_enqueue_scripts', 'portfolio_files' );

//CHANGE TITLE
function portfolio_setup(){
    add_theme_support('title-tag');
};

add_action('after_setup_theme','portfolio_setup');


//Add FONT
function portfolio_fonts(){
    wp_enqueue_style('google-fonts','https://fonts.googleapis.com/css2?family=Courier+Prime&display=swap');
}

add_action('wp_enqueue_scripts','portfolio_fonts');


//ADD VITA POST TYPE
function vita_post(){
    $args = array(
        'label' => 'Vita',
        'public' => true,
        'supports' => array('custom-fields'),
        'menu_icon' => 'dashicons-businesswoman',
    );
        register_post_type('vita',$args);
}

add_action('init','vita_post');

//ADD Gruppenausstellung POST TYPE
function vita_gruppe_post(){
    $args = array(
        'label' => 'Vita-Gruppe',
        'public' => true,
        'supports' => array('custom-fields'),
        'menu_icon' => 'dashicons-groups',
        "hierarchical" => false,
    );
        register_post_type('vita_gruppe',$args);
}

add_action('init','vita_gruppe_post');

//ADD auto title to CUSTOM POST TYPES
function custom_post_type_title ( $post_id ) {
    global $wpdb;
    if ( get_post_type( $post_id ) == 'vita' || get_post_type( $post_id ) == 'vita_gruppe' ) {

        $title = get_field('datum',$post_id)."  ".get_field('beschreibung',$post_id);
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'post_title' => $title ), $where );
    }
    elseif (get_post_type( $post_id ) == 'arbeiten'){

        $title = get_field('title',$post_id);
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'post_title' => $title ), $where );
    }
}
add_action( 'save_post', 'custom_post_type_title' );

//ADD Arbeiten POST TYPE
function arbeiten_post(){
    $args = array(
        'label' => 'Arbeiten',
        'public' => true,
        'supports' => array('custom-fields'),
        'menu_icon' => 'dashicons-admin-customizer',
        "hierarchical" => true,
    );
        register_post_type('arbeiten',$args);
}

add_action('init','arbeiten_post');

//ADD javascript
function wp_hook_javascript() {
    ?>
        <script>
            function selectImg(event) {

                const previewsIdArr = document.getElementsByClassName('previewImages');
                const carousel = document.getElementsByClassName('carousel-item');

                for (let i = 0;i<carousel.length;i++){
                    const curr = document.getElementById('carousel-item-'+previewsIdArr[i].id);
                    curr.classList.remove("active");
                }

                const clickedId = event.srcElement.id;
                const newId = 'carousel-item-'+ clickedId;
                document.getElementById(newId).classList.add('active');
            }
        </script>
    <?php
}
add_action('wp_head', 'wp_hook_javascript');
