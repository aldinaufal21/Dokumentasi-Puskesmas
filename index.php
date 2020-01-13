<?php  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puskesmas | Baros</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/login/css/style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/login/bootstrap/css/bootstrap.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <?php
        	if (isset($_GET['hasil'])) {
                if ($_GET['hasil'] == "gagallogin") {
	        	?>
	        		<div style="width: 1110px; margin-left: 120px;" class="alert alert-success">
			            Username atau password salah, Silahkan cek kembali
			        </div>
	        	<?php
	        	}
                elseif ($_GET['hasil'] == "logout") {
                ?>
                    <div style="width: 1110px; margin-left: 120px;" class="alert alert-success">
                        Logout Berhasil
                    </div>
                <?php
                }
	        	elseif ($_GET['hasil'] == "berhasildaftar") {
	        	?>
	        		<div style="width: 1110px; margin-left: 120px;" class="alert alert-success">
			            Berhasil Daftar
			        </div>
	        	<?php
	        	}	
                elseif ($_GET['hasil'] == "haruslogin") {
                ?>
                    <div style="width: 1110px; margin-left: 120px;" class="alert alert-success">
                        Login Terlebih Dahulu
                    </div>
                <?php
                }   
        	} 
        	else{
        	?>
        	<?php
        	}
        ?>
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/login/images/puskesmas.png" style="width: 250px;" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Daftar Akun</a>
                    </div>

                    
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="post" action="proses_akun.php?aksi=login">
                            <div class="form-group">
                                <label><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" placeholder="username"/>
                            </div>
                            <div class="form-group">
                                <label><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Ingat Saya</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/login/vendor/jquery/jquery.min.js"></script>
    <script src="assets/login/js/main.js"></script>

    <!-- bootstrap -->
    <script src="assets/login/boostrap/js/bootstrap.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>