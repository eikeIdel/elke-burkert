<?php
/*
 Template Name: Vita
 */
?>

<?php
get_header();
?>
<div class="vita-container">
    <h1 class="vita-title">Vita</h1>
    <p class="vita-name">Elke Burkert</p>
    <?php
    // Get All Post Types as List
    $query = new WP_Query(array(
        'post_type' => 'vita',
        'post_status' => 'publish',
        'posts_per_page' => 999999,
    ));

while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $datum = get_field("datum",get_post($post_id));
        $beschreibung = get_field("beschreibung", get_post($post_id));?>

<div class="list-item">
    <div class="list-item-datum"><?= $datum ?></div>
    <div class="list-item-beschreibung"><?= $beschreibung ?></div>
</div>

    <?php }
    wp_reset_query();?>
<!-- Gruppenausstellung -->
<h1 class="vita-title">Gruppenausstellungen</h1>
<?php
    // Get All Post Types as List
    $query = new WP_Query(array(
        'post_type' => 'vita_gruppe',
        'post_status' => 'publish'
    ));

while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $datum = get_field("datum",get_post($post_id));
        $beschreibung = get_field("beschreibung", get_post($post_id));?>

<div class="list-item">
    <div class="list-item-datum"><?= $datum ?></div>
    <div class="list-item-beschreibung"><?= $beschreibung ?></div>
</div>

    <?php }
    wp_reset_query();?>




</div>
<?php
get_footer();
?>