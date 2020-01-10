<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puskesmas | Daftar</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/login/css/style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/login/bootstrap/css/bootstrap.css">

</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        <?php
        	if (isset($_GET['hasil'])) {
        		if ($_GET['hasil'] == "tidaksama") {
	        	?>
	        		<div style="width: 1110px; margin-left: 120px;" class="alert alert-warning">
			            Password Harus Sama ..
			        </div>
	        	<?php
	        	} 	
        	}
        	else{

        	}
        ?>
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Daftar</h2>
                        <form method="post" action="proses_akun.php?aksi=daftar">
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama" placeholder="Nama Lengkap"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="username" placeholder="username" required=""/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password" required=""/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required=""/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>saya menyetujui  <a href="#" class="term-service">ketentuan yang tertera</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/login/images/puskesmas.png" style="width: 250px;" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Saya sudah punya akun</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="assets/login/js/main.js"></script>
</body>
</html>