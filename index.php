<?php
session_start();
include('config/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SMS Admin Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!--//Style-CSS -->
</head>

<body>

    <!-- form section start -->
    <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="index.html"><span>
                                <font style="color:#E61A1A;">SMS</font>
                                <font style="color:black;"> Admin</font></a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="images/2.png" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">

                        <div class="login-form-content">
                            <form class="signin-form" method="post">
                                <div class="one-frm">

                                    <label>User name</label>
                                    <input type="text" name="Name" placeholder="" required="">
                                </div>
                                <div class="one-frm">
                                    <label>Password</label>
                                    <input type="password" name="Password" placeholder="" required="">
                                </div>

                                <button class="btn btn-style mt-3" type="submit" name="btnSubmit"
                                    style="background-color: #E61A1A !important;">Sign In </button>
                                <?php
                                if (isset($_POST['btnSubmit'])) {
                                    $user = $_POST['Name'];
                                    $pass = $_POST['Password'];

                                    $sel=mysqli_query($conn,"select * from login_tbl where login_tbl.userName='$user'");
	                                if ($sel->num_rows>0) {
		                                while ($row=$sel->fetch_assoc()) {
                                            $fetchPass=$row['password'];
                                            if($pass == $fetchPass){
                                                $_SESSION["username"]=$row['userName'];
					                            if (isset($_SESSION['username'])) {
						                         echo "<script>window.location.href='page/index.php'</script>";
					                            }
                                            }
                                        }
                                    }
                                    else {
                                        echo "<script>alert('User Not found')</script>";
                                    }
                                   
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper">
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->

</body>

</html>