<html>
    <head>
        <title>Ilkom Connect</title>
		<?php $this->load->view('_partials/header.php');?>
    </head>

    <body class="bg-light">
		<?php $this->load->view('_partials/nav.php')?>

        <main class="mx-auto" style="max-width: 90%">
            <section class="container pl-lg-3 pt-2 pb-3">
                <h3>Student List</h3>
                <small>Daftar mahasiswa fasilkom yang telah mendaftar di situs ini</small>
            </section>
            <?php foreach ($datalist as $data) {?>
            <div class="media border p-4 mx-auto" style="max-width: 800px">
                <img onerror="this.onerror=null; this.src=<?= 'assets/images/other/blank.png'?>" src="<?php echo $data['nama_file_foto']?>" class="d-none d-lg-block align-self-lg-center rounded-circle" style="width:20%;">
                <div class="media-body ml-4">
                    <img src="<?php echo $data['nama_file_foto']?>" class="d-block d-lg-none pb-2 rounded-circle" style="width:40%;">
                    <h4><?php echo $data['nama']?></h4>
                    <h6 class="text-muted">@<?php echo $data['username']?></h6>
                    <table class="table table-striped">
                        <tr>
                            <td>Kampus</td>
                            <td><?php echo $data['kampus']?></td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td><?php echo $data['jurusan']?></td>
                        </tr>
                        <tr>
                            <td>Tahun Angkatan</td>
                            <td><?php echo $data['tahun_angkatan']?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php } ?>
        </main>

		<?php $this->load->view('_partials/footer.php')?>

    </body>
</html>
