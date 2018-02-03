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
<section class="section-about">
    <div class="container">
        <div class="about">
            <div class="about-item">
                <div class="img owl-single">
                    <?php foreach($listImage as $r) { ?>
                    <img src="<?=base_url('img/img_about_folder/'.$r->img_about_image);?>" alt="">
                    <?php } ?>
                </div>
                <div class="text">
                    <h2 class="heading">Tentang Kami</h2>
                    <div class="desc">
                        <p align="justify">
                            <?php
                            $desc =  str_replace('&lt;', '<', str_replace('&gt;', '>', $detailprofil->menu_desc));
                            echo $desc;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-team">
    <div class="container">
        <?php foreach($listTeam as $t) { ?>
        <div class="team">
            <h2 class="heading text-center"><?=$t->team_name;?></h2>
            <div class="team_content">
                <div class="row">
                    <?php 
                    $team_id = $t->team_id;
                    $listStaff = $this->profil_m->select_staff($team_id)->result();
                    foreach($listStaff as $s) {
                    ?>
                    <div class="col-xs-6 col-md-3">
                        <div class="team_item text-center">
                            <div class="img">
                                <a href="#"><img src="<?=base_url('img/employee_folder/'.$s->employee_image);?>" alt=""></a>
                            </div> 
                            <div class="text">
                                <h2><?=$s->employee_name;?></h2>
                                <span><?=$s->employee_position;?></span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>