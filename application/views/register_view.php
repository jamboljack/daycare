<link href="<?=base_url();?>backend/js/sweetalert2.css" rel="stylesheet" type="text/css" />
<script src="<?=base_url();?>backend/js/sweetalert2.min.js"></script>

<style type="text/css">
.contact .contact-form .field-select {
    border: 2px solid #232323;
        border-top-color: rgb(35, 35, 35);
        border-right-color: rgb(35, 35, 35);
        border-bottom-color: rgb(35, 35, 35);
        border-left-color: rgb(35, 35, 35);
    width: 100%;
    margin-top: 20px;
    color: #232323;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -ms-transition: all .3s ease;
    -o-transition: all .3s ease;
    height: 40px;
    padding: 0 10px;
}
</style>

<section class="section-sub-banner bg-9">
    <div class="awe-overlay"></div>
    <div class="sub-banner">
        <div class="container">
            <div class="text text-center heading">
                <h2>PENDAFTARAN ANAK</h2>
            </div>
        </div>
    </div>
</section>
<section class="section-contact">
    <div class="container">
        <div class="contact">
            <div class="heading-has-sub text-center">
                <h2 class="heading">PENDAFTARAN ANAK DIDIK</h2>
                <p>Silahkan Isi Biodata Anak Anda untuk Pendataan Kami</p>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="shortcode-heading">Form Pendaftaran Anak</h3>
                    <div class="contact-form">
                        <form id="contact_form" action="" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select class="field-select" name="lstPaket" id="lstPaket" required autofocus>
                                        <option value="">- PILIH PAKET -</option>
                                        <?php
                                        foreach ($listPaket as $r) {
                                        ?>
                                        <option value="<?=$r->paket_id;?>"><?=$r->paket_name;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="hidden" name="year_id" value="<?=$tahun->year_id;?>">
                                    <input type="text" class="field-text" name="year" value="Tahun : <?=$tahun->year_name;?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <select class="field-select" name="lstOffice" id="lstOffice" required>
                                        <option value="">- PILIH DAYCARE -</option>
                                        <?php
                                        foreach ($listOffice as $r) {
                                        ?>
                                        <option value="<?=$r->office_id;?>"><?=$r->office_name;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="field-text" name="name" id="name" placeholder="Nama Anak" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="place" id="place" placeholder="Tempat Lahir" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="date" id="date" placeholder="Tanggal Lahir (dd-mm-yyyy)" required>
                                </div>
                                <div class="col-sm-6">
                                    <select class="field-select" name="lstJK" id="lstJK" required>
                                        <option value="">- PILIH JENIS KELAMIN -</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select class="field-select" name="lstAgama" id="lstAgama" required>
                                        <option value="">- PILIH AGAMA -</option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN">KRISTEN</option>
                                        <option value="KATHOLIK">KATHOLIK</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDHA">BUDHA</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <select class="field-select" name="lstProvinsi" id="lstProvinsi" onchange="tampilKabupaten()" required>
                                        <option value="">- PILIH PROVINSI -</option>
                                        <?php
                                        foreach ($listProvince as $r) {
                                        ?>
                                        <option value="<?=$r->provinsi_id;?>"><?=$r->provinsi_nama;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-12" id="PgKabupaten">
                                    <?php
                                    $style_kabupaten = 'class="field-select" id="lstKabupaten" required onchange="tampilKecamatan()"';
                                    echo form_dropdown("lstKabupaten", array('' => '- Pilih Kabupaten -'), '', $style_kabupaten);
                                    ?>
                                </div>
                                <div class="col-sm-12" id="PgKecamatan">
                                    <?php
                                    $style_kecamatan = 'class="field-select" id="lstKecamatan" required onchange="tampilDesa()"';
                                    echo form_dropdown("lstKecamatan", array('' => '- PILIH KECAMATAN -'), '', $style_kecamatan);
                                    ?>
                                </div>
                                <div class="col-sm-12" id="PgDesa">
                                    <?php
                                    $style_desa = 'class="field-select" id="lstDesa" required';
                                    echo form_dropdown("lstDesa", array('' => '- PILIH DESA -'), '', $style_desa);
                                    ?>
                                </div>
                                <div class="col-sm-12" id="PgAlamat">
                                    <input type="text" class="field-text" name="address" id="address" placeholder="Alamat Lengkap" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="phone" id="phone" maxlength="12" placeholder="No. Handphone Orang Tua" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="field-text" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="field-text" name="ortu" id="ortu" placeholder="Nama Orang Tua/Wali Murid" required>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-12">
                                    <?=$this->recaptcha->render();?>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="awe-btn awe-btn-13">Daftar</button>
                                </div>
                            </div>
                            <div id="contact-content"></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?=base_url();?>backend/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>front/js/lib/jquery.validate.min.js"></script>
<script type="text/javascript">
function tampilKabupaten() {
    provinsi_id = document.getElementById("lstProvinsi").value;
    $.ajax({
        url:"<?=site_url('register/select_kabupaten_change/');?>"+provinsi_id,
        success: function(response) {
            $("#PgKabupaten").show();
            $("#lstKabupaten").html(response);
        },
        dataType:"html"
    });
    return false;
}

function tampilKecamatan() {
    kabupaten_id = document.getElementById("lstKabupaten").value;
    $.ajax({
        url:"<?=site_url('register/select_kecamatan_change/');?>"+kabupaten_id,
        success: function(response) {
            $("#PgKecamatan").show();
            $("#lstKecamatan").html(response);
        },
        dataType:"html"
    });
    return false;
}

function tampilDesa() {
    kecamatan_id = document.getElementById("lstKecamatan").value;
    $.ajax({
        url:"<?=site_url('register/select_desa_change/');?>"+kecamatan_id,
        success: function(response) {
            $("#PgDesa").show();
            $("#PgAlamat").show();
            $("#lstDesa").html(response);
        },
        dataType:"html"
    });
    return false;
}

$(document).ready(function() {
    $("#PgKabupaten").hide();
    $("#PgKecamatan").hide();
    $("#PgDesa").hide();
    $("#PgAlamat").hide();

    $("#date").inputmask("d-m-y", {
        autoUnmask: true
    });

    $("#contact_form").validate({
        rules: {
            lstPaket: { required: true },
            lstOffice: { required: true },
            name: { required: true, minlength: 3 },
            place: { required: true, minlength: 3 },
            date: { required: true, minlength: 3 },
            lstJK: { required: true },
            lstAgama: { required: true },
            lstProvinsi: { required: true },
            lstKabupaten: { required: true },
            lstKecamatan: { required: true },
            lstDesa: { required: true },
            address: { required: true, minlength: 5 },
            phone: { required: true, number: true, minlength: 11 },
            email: { required: true, email: true, minlength: 10 },
            ortu: { required: true, minlength: 5 }
        },
        messages: {
            lstPaket: {
                required:'Silahkan Pilih Paket'
            },
            lstOffice: {
                required:'Silahkan Pilih Daycare'
            },
            name: {
                required:'Silahkan Masukkan Nama Anak', minlength: 'Minimal 3 Karakter'
            },
            place: {
                required:'Silahkan Masukkan Tempat Lahir Anak', minlength: 'Minimal 3 Karakter'
            },
            date: {
                required:'Silahkan Masukkan Tanggal Lahir Anak'
            },
            lstJK: {
                required:'Silahkan Pilih Jenis Kelamin'
            },
            lstAgama: {
                required:'Silahkan Pilih Agama'
            },
            lstProvinsi: {
                required:'Silahkan Pilih Provinsi'
            },
            lstKabupaten: {
                required:'Silahkan Pilih Kabupaten'
            },
            lstKecamatan: {
                required:'Silahkan Pilih Kecamatan'
            },
            lstDesa: {
                required:'Silahkan Pilih Desa'
            },
            address: {
                required:'Silahkan Masukkan Alamat Sekarang', minlength:'Minimal 5 Karakter'
            },
            phone: {
                required:'Silahkan Masukkan No. Handphone', minlength:'Minimal 12 Digit'
            },
            email: {
                required:'Silahkan Masukkan Email Anda', minlength:'Minimal 10 Karakter', email:'Email Tidak Valid'
            },
            ortu: {
                required:'Silahkan Masukkan Nama Orang Tua/Wali Murid', minlength:'Minimal 5 Karakter'
            }
        },
        submitHandler: function(form) {
            dataString = $("#contact_form").serialize();
            $.ajax({
                url: "<?=site_url('register/savedata');?>",
                type: "POST",
                dataType: 'json',
                data: dataString,
                success: function(data) {
                    if (data.status === 'success') {
                        swal({
                            title:"Sukses",
                            text: "Pendaftaran Berhasil",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "success"
                        });
                        location.reload();
                    } else {
                        swal({
                            title:"Gagal",
                            text: "Pendaftaran Gagal",
                            timer: 2000,
                            showConfirmButton: false,
                            type: "errror"
                        });
                    }
                },
                error: function() {
                    swal({
                        title:"Error",
                        text: "Kirim Pesan Gagal",
                        timer: 2000,
                        showConfirmButton: false,
                        type: "error"
                    });
                }
            });
        }
    });
});
</script>