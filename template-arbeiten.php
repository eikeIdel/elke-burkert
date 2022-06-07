<?php
/*
 Template Name: Arbeiten
 */
?>

<?php get_header()?>

<div class="arbeiten-container">
    <div class="arbeiten-subcontainer">
        <h1 class="arbeiten-title">Arbeiten</h1>
        <div class="arbeiten-img-container">
            <?php
                $query =new WP_Query(array(
                    'post_type'=> 'arbeiten',
                    'post_status' => 'publish',
                    "post_per_page" => 999999,
                ));

                while($query->have_posts()):
                    $query->the_post();
                    $post_id = get_the_ID();
                    $img_arr = get_field("bilder", get_post($post_id));
                    $prev_img = $img_arr["pic_one"];
            ?>

                <a href=<?= get_permalink($post_id) ?>> <img class="arbeiten_prev_img" src=<?="$prev_img"?> alt="<?= $prev_img?>"/></a>

            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</div>

<?php get_footer()?>