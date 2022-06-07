<?php
get_header("front");
?>
<div class="home-container">
<h1 class="home-title">Elke Burkert</h1>
<?php wp_list_pages(
    array(
        "title_li" => "",

    )
);?>
</div>
<?php
get_footer("front");
?>