<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Berhasil Registrasi.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Sudah Terdaftar')</script>";
		}
		
	} else {
		echo "<script>alert('Password Tidak Sesuai.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--======= BOX ICON ======-->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

     <!--======= CSS ======-->
     <link rel="stylesheet" href="assets/css/styles.css">
    
    <title>Register Form</title>
</head>
<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
    

    <div class="form">
        <img src="assets/img/imglogin.svg" alt="" class="form__img">

        <form action="" method="POST" class="form__content">
            <h1 class="form__title">Welcome Register Page</h1>

            <div class="form__div form__div-one ">
                <div class="form__icon">
                    <i class="bx bx-user-circle"></i>
                </div>

                <div class="form__div-input">
                    <label for="" class="form__label">Username</label>
                    <input type="text" name="username" class="form__input" value="<?php echo $username; ?>" required>
                </div>
            </div>
            <div class="form__div form__div-one ">
                <div class="form__icon">
                    <i class="bx bx-user-circle"></i>
                </div>

                <div class="form__div-input">
                    <label for="" class="form__label">Email</label>
                    <input type="email" name="email" class="form__input" value="<?php echo $email; ?>" required>
                </div>
            </div>


            <div class="form__div">
                <div class="form__icon">
                    <i class="bx bx-lock"></i>
                </div>

                <div class="form__div-input">
                    <label for="" class="form__label">Password</label>
                    <input type="password" name="password" class="form__input" value="<?php echo $_POST['password']; ?>" required>
                </div>
            </div>
            <div class="form__div">
                <div class="form__icon">
                    <i class="bx bx-lock"></i>
                </div>

                <div class="form__div-input">
                    <label for="" class="form__label">Confirm Password</label>
                    <input type="password" name="cpassword" class="form__input"value="<?php echo $_POST['cpassword']; ?>" required>
                </div>
            </div>

            <a href="index.php" class="form__forgot">Sudah Punya Akun?</a>


            <button name="submit" class="form__button">Register</button>
        


        </form>
    </div>
</div>



    <!--======= MAIN JS ======-->
<script src="assets/js/main.js"> </script>
</body>
</html>