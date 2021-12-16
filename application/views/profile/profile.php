<html>
    <head>
        <title>Profil Anda</title>
		<?php $this->load->view('_partials/header.php');?>
    </head>

    <body class="bg-light">

		<?php $this->load->view('_partials/nav.php')?>
		
        <main class="row mx-auto" style="max-width: 90%">
            <section class="container pl-lg-3 py-3">
                <h3>Profile</h3>
            </section>
			<aside class="col-9 col-md-5 mx-auto col-lg-4 col-xl-3">
                <section class="container shadow card border-0 pb-3 pt-3">
                    <img
							onerror="this.onerror=null;
							this.src=<?php echo '/assets/images/other/blank.png'?>"

							src=<?php echo base_url($imgUrl)?>
					>
                </section><br>
            </aside>
            <article class="col-lg-8 col-xl-9 shadow bg-white pt-3 pb-4">
                <div class="row">
                    <section class="col-lg-6">
                        <?php // Melakukan Loop untuk menampilkan data kiri
                        foreach($data_left as $term => $term_value) { ?>
							<div class="form-group">
								<label><?php echo $term ?></label>
								<span class="container card py-2"><?php echo $term_value?></span>
							</div>
                        <?php } ?>
                    </section>
                    <section class="col-lg-6">
                        <?php // Melakukan Loop untuk menampilkan data kanan
                        foreach($data_right as $term => $term_value) { ?>
							<div class="form-group">
								<label><?php echo $term ?></label>
								<span class="container card py-2"><?php echo $term_value?></span>
							</div>
                        <?php } ?>
                    </section>
                </div>
            </article>

            <div class="w-100 text-right row justify-content-end mx-auto pt-5">
                <div class="col-lg-2">
                    <button onclick="document.location='<?php echo base_url('Profile/update')?>'" type="button" class="w-100 btn btn-primary">
                        <i class='text-white fas fa-edit'></i>&nbsp; Edit Profile
                    </button>
                </div>
                <div class="row mx-auto mx-lg-0 col-lg-2 pt-4 pt-lg-0 align-self-center">
                    <a class="col text-decoration-none text-center text-secondary" href="<?php echo base_url()?>">kembali ke menu</a>
                </div>
            </div>
        </main>

	<?php $this->load->view('_partials/footer.php')?>

    </body>
</html>
