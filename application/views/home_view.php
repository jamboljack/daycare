<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <?php
            $no = 1;
            foreach ($listSlider as $s) {
                if ($no % 2 == 0) {
                    $transisi = 'boxslide';
                } else {
                    $transisi = 'curtain-1';
                }
            ?>
            <li data-transition="<?=$transisi;?>">
                <img src="<?=base_url();?>img/slider_folder/<?=$s->slider_image;?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                </div>
                <!--<div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000"><?php // echo $s->slider_title; ?></div>-->
            </li>
            <?php 
                $no++;
            }
            ?>
        </ul>
    </div>
</section>