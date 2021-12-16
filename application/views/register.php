<html>
    <head>
        <title>Register</title>
		<?php $this->load->view('_partials/header.php')?>
    </head>

    <body class="bg-light">
    <div class="container text-center pt-5">
        <a href="<?= base_url()?>" class="display-4 text-decoration-none text-primary"><i class='text-primary fas fa-user-plus'></i> Ilkom Connect</a>
        <h6 class="display-5 pt-2 pb-4">Register to Ilkom Connect</h6>
    </div>

    <main class="row" style="max-width: 100%">

		<?php if($this->session->flashdata('message_register_error')): ?>
			<div class="container-fluid">
				<div class="alert btn-secondary">
					<?= $this->session->flashdata('message_register_error') ?>
					<a href="#" class="close text-white" data-dismiss="alert">&times;</a>
				</div>
			</div>
		<?php endif ?>

        <div class="container col-11 col-md-5 justify-content-center">
            <form action="" method="post">
                <fieldset class="container shadow card border-0 py-3">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="text-white fas fa-user-alt"></i></span>
                            </div>
                            <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>"
                                   name="nama" placeholder="Nama" id="nama"
                                   data-toggle="tooltip" title="Nama hanya boleh berisi huruf (a-z), titik, dan koma" required>
                            <div class="invalid-feedback">
                                <?= form_error('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="text-white fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" name="username"
                                   placeholder="Username" id="username" data-toggle="tooltip"
                                   title="Username hanya dapat mengandung huruf, angka, titik, dan/atau underscore (_)" required>
                            <div class="invalid-feedback">
                                <?= form_error('username') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="text-white fas fa-at"></i></span>
                            </div>
                            <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>"
                                   name="email" placeholder="Email" id="email" data-toggle="tooltip"
                                   title="Email harus valid dan aktif" required>
                            <div class="invalid-feedback">
                                <?= form_error('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="text-white fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
                                   name="password" placeholder="Password" id="password" data-toggle="tooltip"
                                   title="Password harus minimal 8 karakter, mengandung angka (0-9) dan huruf kapital. Tidak boleh ada spasi" required>
                            <div class="invalid-feedback">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary"><i class="text-white fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control <?= form_error('confirmPassword') ? 'is-invalid' : '' ?> "
                                   name="confirmPassword" placeholder="Confirm Password" id="confirmPassword" data-toggle="tooltip"
                                   title="Konfirmasi Password" required>
                            <div class="invalid-feedback">
                                <?= form_error('confirmPassword') ?>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid text-sm-right text pt-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#konfirmasi">
                            Register
                        </button>
                        <a class="pl-3 text-decoration-none text-secondary" href="<?= base_url()?>">kembali ke main menu</a>
                    </div>
                    <div class="modal fade" id="konfirmasi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Register</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="register" class="btn btn-primary">Ya</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </main>

    <?php
        unset($_SESSION["nameVal"]);
        unset($_SESSION["usernameVal"]);
        unset($_SESSION["usernameAlreadyUsed"]);
        unset($_SESSION["emailVal"]);
        unset($_SESSION["usernameAlreadyUsed"]);
        unset($_SESSION["passwordVal"]);
        unset($_SESSION["confirmPasswordVal"]);
    ?>

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    </body>
</html>
