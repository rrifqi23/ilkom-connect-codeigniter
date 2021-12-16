<html lang="id">

	<head>
		<title>Ilkom Connect</title>
		<?php $this->load->view('_partials/header.php');?>
	</head>

	<body class="bg-light">

        <?php $this->load->view('_partials/nav.php')?>

        <main class="mx-auto" style="max-width: 90%">
`           <div class="row pb-5 pt-1 pt-lg-3">
                <section class="col-lg-6 order-2 order-lg-1 my-auto">
                    <div class="container">
                        <?php if ($loggedin === null) {?>
                            <h1 class="display-4">Welcome, Ilkomers!</h1>
                            <p class="font-weight-normal">
                                Ilkom Connect adalah website yang berisi kontak para mahasiswa
                                fasilkom unsri yang telah memiliki akun di website ini.
                                Website ini akan terus dikembangkan agar dapat memiliki fitur chat
                                sehingga antar akun dapat berkomunikasi satu sama lain.
                            </p>
                            <div class="row align-items-center pt-3">
                                <div class="col-12 col-lg-5 pb-3 pb-lg-0">
                                    <button onclick="document.location='<?php echo base_url('Login')?>'" type="button" class="btn btn-primary btn-lg w-100">
                                        Sign in
                                    </button>
                                </div>
                                <div class="col-lg-7 align-items-center h-100">
                                    <span class="align-self-center">
                                        atau<a class="ml-1 ml-lg-3 text-primary" href='<?php echo base_url('Register')?>'>Buat akun</a>
                                    </span>
                                </div>
                            </div>
                        <?php } else {?>
                            <h1 class="display-4">Welcome, <?php echo $nama?></h1>
                            <p class="font-weight-light">
                                Anda berhasil masuk dan terhubung dengan Ilkom Connect! anda dapat
                                menggunakan website ini untuk melihat kontak para mahasiswa
                                fasilkom unsri yang telah memiliki akun di website ini dan/atau melihat
                                data anda sendiri serta mengeditnya!
                            </p>
                            <div class="row">
                                <div class="col-12 col-lg-5 pt-3">
                                    <button onclick="document.location='<?php echo base_url('Profile')?>'" type="button" class="btn btn-primary btn-lg w-100">
                                        Profile anda
                                    </button>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </section>
                <section class="col-lg-6 order-1 order-lg-2">
                    <div class="container py-5 py-lg-0">
                        <img class="img-fluid" id="home_img" src="<?php echo base_url('assets/images/other/socimg.png')?>" alt="social interaction image">
                    </div>
                </section>
            </div>
		</main>

		<?php $this->load->view('_partials/footer.php')?>

    </body>
</html>
