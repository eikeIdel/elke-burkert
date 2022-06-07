<?php get_header()?>
    <div class="single-arbeiten-container">
        <div class="single-arbeiten-subcontainer">
            <div class="title-container">
                <p >Titel: </p>
                <p ><?php the_field("title")?></p>
            </div>
            <?php if(get_field("untertitel")):?>
                <div class="subtitle-container">
                    <p class="subtitle">Untertitel: </p>
                    <p> <?php  the_field("untertitel")?></p>
                 </div>
            <?php endif ?>
            <div class="material-container">
                <p class="material-heading">Material:</p>
                <p class="material"> <?php  the_field("material")?></p>
                <p class="date"> <?php  the_field("date")?></p>
            </div>
            <div class="img-container">
            <?php
                $bilder = get_field("bilder");

                foreach ($bilder as $index => $url):
                    if($url):?>
                    <img  src='<?=$url?>' alt='<?=$url?>' id=<?=$index?> class="previewImages" data-toggle='modal' data-target='#slide-modal' onclick='selectImg(event)'/>
                    <?php endif; endforeach;?>
            </div>
    </div>



    <!-- MODAL START -->
    <div class="modal fade " id="slide-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered" style="max-width:70%;">
            <div class="modal-content " style="background-color:transparent">
                <!-- CAROUSEL START -->
                <div id="carouselControls" class="carousel" data-interval="false">
                    <div class="carousel-inner">
                        <?php
                        foreach ($bilder as $index => $url):
                            if($url):
                        ?>
                            <div  class="carousel-item" id="<?="carousel-item-".$index?>">
                            <img  class="d-block w-100" src="<?=$url?>" alt="<?=$url?>">
                            </div>
                        <?php endif;
                        endforeach;?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- CAROUSEL END -->
            </div>
        </div>
    </div>
    <!-- MODAL END -->

</div>
<?php get_footer()?>