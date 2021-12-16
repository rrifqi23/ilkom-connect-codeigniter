<!--
	-> Buat controller & model update
	-> bisa dilihat di docs codeigniter untuk upload file
	-> sisanya diambil dari project lama
-->


<html>
    <head>
        <title>Update Profile</title>
		<?php $this->load->view('_partials/header.php');?>
    </head>

    <body class="bg-light" style="font-family: sans-serif">

		<?php $this->load->view('_partials/nav.php')?>

		<?php if($this->session->flashdata('upload_error')): ?>
			<div class="container-fluid">
				<div class="alert btn-secondary">
					<?= $this->session->flashdata('upload_error') ?>
					<a href="#" class="close text-white" data-dismiss="alert">&times;</a>
				</div>
			</div>
		<?php endif ?>

		<?php if($this->session->flashdata('message_update_error')): ?>
			<div class="container-fluid">
				<div class="alert btn-secondary">
					<?= $this->session->flashdata('message_update_error') ?>
					<a href="#" class="close text-white" data-dismiss="alert">&times;</a>
				</div>
			</div>
		<?php endif ?>

        <form action="" method="post" enctype="multipart/form-data">
            <main class="row mx-auto" id="formarea" style="max-width: 90%">
                <section class="container pl-lg-3 pt-2 pb-2">
                    <h3>Update Profil</h3>
                </section>
                <aside class="col-9 col-md-5 mx-auto col-lg-4 col-xl-3">
                    <div class="container shadow card border-0 py-3">
                        <section class="container card border-0 py-3">
                            <img
									onerror="this.onerror=null;
									this.src=<?php echo '/assets/images/other/blank.png'?>"

									id="photo_preview"
									src=<?php echo base_url($imgUrl)?>
							>
                        </section>
                        <section class="container">
                            <label for="file">Pilih photo profilmu: </label>
                            <div class="custom-file" id="file">
                                <input class="custom-file-input" type="file" accept=".png, .jpeg, .jpg" name="photo" id="photo" onchange="preview_photo(event)">
                                <label class="custom-file-label" for="photo">Pilih photo</label>
                            </div>
                        </section>
                    </div>
                </aside>
                <article class="col-lg-8 col-xl-9">
                    <fieldset class="container shadow card border-0 py-3">
                        <div class="row">
                            <section class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" size="40" placeholder="Masukkan Nama.." name='nama' value='<?php echo $nama?>' pattern="[a-zA-Z-'., ]*$" required>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="bp">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="bp" size="40" placeholder="Masukkan Tempat Lahir.." name='bp' value='<?php echo $bp?>' required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="tl">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tl" size="40" name='tl' value=<?php echo $tl?> required>
                                    </div>
                                </div>
                                <label>Jenis Kelamin</label>
                                <div id="sex" class="pb-3">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="lk" name="sex" value="Laki-Laki"
                                            <?php if ($sex == "Laki-Laki") echo 'checked';?>>
                                        <label class="custom-control-label" for="lk">Laki-Laki</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="pr" name="sex" value="Perempuan"
                                            <?php if ($sex == "Perempuan") echo 'checked';?>>
                                        <label class="custom-control-label" for="pr">Perempuan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phonenum">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phonenum" size="40" placeholder="Masukkan Nomor Telepon.." name='phonenum' value='<?php echo $phonenum?>' pattern="[+0-9]*$" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea class="form-control" id="address" placeholder="Masukkan Alamat.." name='address' required><?php echo $address?></textarea>
                                </div>
                            </section>
                            <section class="col-lg-6">
                                <div class="form-group">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control" id="nim" size="40" placeholder="Masukkan NIM.." name='nim' maxlength="14" value='<?php echo $nim?>' pattern="09[0-9]{12}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" size="40" placeholder="Masukkan Email.." name='email' value='<?php echo $email?>' required>
                                </div>
                                <div class="form-group">
                                    <label for="t_angk">Tahun Angkatan</label>
                                    <input type="number" class="form-control" id="t_angk" size="40" placeholder="Masukkan Tahun.. (2006-2021)" name='t_angk' min="2006" max="2021" value=<?php echo $t_angk?> required>
                                </div>
                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select name="jurusan" class="custom-select" id="jur" required>
                                        <option value="" disabled>Pilih Jurusan..</option>
                                        <option value="Diploma Komputer"
                                            <?php if ($jurusan == "Diploma Komputer") echo 'selected';?>>
                                            Diploma Komputer
                                        </option>
                                        <option value="Teknik Informatika"
                                            <?php if ($jurusan == "Teknik Informatika") echo 'selected';?>>
                                            Teknik Informatika
                                        </option>
                                        <option value="Sistem Informasi"
                                            <?php if ($jurusan == "Sistem Informasi") echo 'selected';?>>
                                            Sistem Informasi
                                        </option>
                                        <option value="Teknik Komputer"
                                            <?php if ($jurusan == "Teknik Komputer") echo 'selected';?>>
                                            Teknik Komputer
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kps">Kampus</label>
                                    <select name="kampus" class="custom-select" id="kps" required>
                                        <option value="" disabled>Pilih Kampus..</option>
                                        <option value="Indralaya"
                                            <?php if ($kampus == "Indralaya") echo 'selected';?>>
                                            Indralaya
                                        </option>
                                        <option value="Palembang"
                                            <?php if ($kampus == "Palembang") echo 'selected';?>>
                                            Palembang
                                        </option>
                                    </select>
                                </div>
                            </section>
                        </div>
                    </fieldset>
                    <div class="text-right row justify-content-end mx-auto pt-5">
                        <div class="col-lg-2">
                            <button type="button" class="w-100 btn btn-primary" data-toggle="modal" data-target="#konfirmasiSimpan">
                                <i class='text-white fas fa-save'></i>&nbsp; Simpan
                            </button>
                        </div>
                        <div class="col-lg-2 pt-3 pt-lg-0">
                            <button type="button" class="w-100 btn btn-secondary" data-toggle="modal" data-target="#konfirmasiBatal">
                                <i class='text-white fas fa-arrow-left'></i>&nbsp; Batal
                            </button>
                        </div>
                    </div>

                    <!--Konfirmasi untuk Simpan-->
                    <div class="modal fade" id="konfirmasiSimpan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Menyimpan Update</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Ya</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Konfirmasi untuk Batal-->
                    <div class="modal fade" id="konfirmasiBatal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Batal Update</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" onclick="document.location=<?= base_url('Profile')?>">Ya</button>
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </main>
        </form>

		<?php $this->load->view('_partials/footer.php')?>

        <script>
            const preview_photo = function(event) {
                const photo_preview = document.getElementById('photo_preview');
                photo_preview.src = URL.createObjectURL(event.target.files[0]);
            };

            // Kode untuk menunjukkan nama file di select file (Bawaan Bootstrap)
            $(".custom-file-input").on("change", function() {
                const fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    </body>
</html>
