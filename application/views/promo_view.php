<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>PROMO</h2>
            </div>
        </div>
    </div>
</section>
<section class="section_page-gallery">
    <div class="container">
        <div class="gallery">
            <h1 class="element-invisible">Promo</h1>
            <div class="gallery-cat text-center">
                <ul class="list-inline">
                    <li class="active"><a href="#" data-filter="*">Semua</a></li>
                    <?php foreach($listCategory as $r) { ?>
                    <li><a href="#" data-filter=".<?=$r->promo_category_seo;?>"><?=$r->promo_category_name;?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="gallery-content">
                <div class="row">
                    <div class="gallery-isotope col-4">
                        <div class="item-size"></div>
                        <?php foreach($listPromo as $r) { ?>
                        <div class="item-isotope <?=$r->promo_category_seo;?>">
                            <div class="gallery_item">
                                <a href="<?=base_url('img/promo_folder/'.$r->promo_image);?>">
                                    <img src="<?=base_url('img/promo_folder/'.$r->promo_image);?>" alt="">
                                </a>
                                <h6 class="text"><?=$r->promo_name;?></h6>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>       
</section>