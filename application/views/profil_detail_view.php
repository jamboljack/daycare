<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>PROFIL</h2>
            </div>
        </div>
    </div>
</section>

<section class="section-shortcode">
    <div class="container">
        <div class="shortcode">
            <div class="heading-has-sub text-center">
                <h2 class="heading"><?=$detail->menu_name;?></h2>
            </div>
            
            <div class="shortcode-heading-list">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <?php
                        $desc =  str_replace('&lt;', '<', str_replace('&gt;', '>', $detail->menu_desc));
                        echo $desc;
                        ?>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
</section>