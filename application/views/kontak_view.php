<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>

<?=$map['js'];?>
<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>KONTAK KAMI</h2>
            </div>
        </div>
    </div>
</section>
<section class="section-contact">
    <div class="container">
        <div class="contact">
            <div class="row">
                <div class="col-md-6 col-lg-5">
                    <div class="text">
                        <h2>Kontak Kami</h2>
                        <?php foreach ($listBranch as $r) { ?>
                        <br>
                        <p><b><?=$r->branch_name;?></b></p>
                        <?php
                        $branch_id  = $r->branch_id;
                        $listOffice = $this->kontak_m->select_list($branch_id)->result();
                        foreach ($listOffice as $o) {
                        ?>
                        <p><i class="fa fa-home"></i> <b><?=ucwords(strtolower($o->office_name));?></b></p>
                        <?=$o->office_address;?><br>
                        No. Telp : <?=$o->office_phone;?><br>
                        HP/WhatsApp : <?=$o->office_mobile;?><br>
                        Email : <a href="mailto:<?=$o->office_email;?>"><?=$o->office_email;?></a><br>
                        <?php }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-lg-offset-1">
                    <div class="contact-form">
                        <form id="contact_form" action="" method="post">
                            <div id="Msg"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="name" id="name" placeholder="Nama Anda" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="email" id="email" placeholder="Email Anda" required>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="field-text" name="subject" id="subject" placeholder="Judul Anda" required>
                                </div>
                                <div class="col-sm-12">
                                    <textarea cols="30" rows="10" name="message" id="message" class="field-textarea" placeholder="Tuliskan Pesan Anda" required></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                </div>
                                <div class="col-sm-12">
                                    <?=$this->recaptcha->render();?>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="awe-btn awe-btn-13">Kirim</button>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-map">
    <h1 class="element-invisible">Map</h1>
    <div class="contact-map">
        <div id="map">
        <?=$map['html'];?>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.validate.min.js"></script>
<script type="text/javascript">
function resetForm() {
    $("#name").val('');
    $("#email").val('');
    $("#subject").val('');
    $("#message").val('');
}

$(document).ready(function() {
    $("#Msg").hide();
    $("#contact_form").validate({
        rules: { 
            name: {
                required: true, minlength: 3
            },
            email: { 
                required: true, minlength: 5, email: true
            },
            subject: { 
                required: true, minlength: 5
            },
            message: { 
                required: true, minlength: 5
            }
        },
        messages: {
            name: {
                required:'Silahkan Masukkan Nama Anda', minlength:'Minimal 3 Karakter'
            },
            email: { 
                required:'Silahkan Masukkan Email Anda', minlength:'Minimal 5 Karakter', email:'Email Anda Tidak Valid'
            },
            subject: { 
                required:'Silahkan Masukkan Judul Anda', minlength:'Minimal 5 Karakter'
            },
            message: { 
                required:'Silahkan Masukkan Pesan Anda', minlength:'Minimal 5 Karakter'
            }
        },
        submitHandler: function(form) {
            dataString = $("#contact_form").serialize();
            $.ajax({
                url: "<?=site_url('kontak/send_data');?>",
                type: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Pesan Anda Berhasil Terkirim",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "success"
                        });
                        location.reload();
                    } else {
                        swal({
                            title:"Gagal",
                            text: "Pesan Anda Gagal Terkirim",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "errror"
                        });
                    }
                },
                error: function() {
                    setTimeout(function() {
                        swal({
                            title:"Error",
                            text: "Kirim Pesan Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "error"
                        })
                    });
                }
            });
        }
    });
});
</script>