<html>
    <head>
        <title>Login</title>
        <?php $this->load->view('_partials/header.php')?>
    </head>

    <body class="bg-light">
        <div class="container text-center pt-5">
            <a href="<?= base_url()?>" class="display-4 text-decoration-none text-primary"><i class='text-primary text-white fas fa-user-plus'></i> Ilkom Connect</a>
            <h6 class="display-5 pt-2 pb-4">Sign in to Ilkom Connect</h6>
        </div>
        <main class="row" style="max-width: 100%">
            <div class="container col-11 col-md-4 justify-content-center">

				<?php if($this->session->flashdata('message_login_error')): ?>
                    <div class="container-fluid">
                        <div class="alert btn-secondary">
							<?= $this->session->flashdata('message_login_error') ?>
                            <a href="#" class="close text-white" data-dismiss="alert">&times;</a>
                        </div>
                    </div>
				<?php endif ?>

                <form action="" method="post">
                    <fieldset class="container shadow card border-0 py-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white"><i class="text-white fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="user" placeholder="Username/email" id="user" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white"><i class="text-white fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                        </div>
                        <div class="container-fluid text-right text pt-5">
                            <button type="submit" name="login" class="btn btn-primary">
                                Sign in
                            </button>
                            <a class="pl-3 text-decoration-none" href="<?=base_url('Register')?>">Register</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </main>
    </body>
</html>
