<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Email atau Password Salah.')</script>";
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
    
    <title>Login Form</title>
</head>
<body>
    <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
    

    <div class="form">
        <img src="assets/img/imglogin.svg" alt="" class="form__img">

        <form action="POST" class="form__content">
            <h1 class="form__title">Welcome</h1>

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

            <a href="registerpage.php" class="form__forgot">Belum Punya AKun?</a>


            <button name="submit" class="form__button">Login</button>
            

        </form>
    </div>
</div>



    <!--======= MAIN JS ======-->
<script src="assets/js/main.js"> </script>
</body>
</html>