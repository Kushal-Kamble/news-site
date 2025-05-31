<?php
  include "config.php";
  session_start();

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/post.php");//agar username  set hai matlab user already lohin hai  to  redect ho jaye post.php file me
  }
?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                        <?php
                          if(isset($_POST['login'])){//logi ka button press hoova hai nahi 
                            include "config.php";
                            if(empty($_POST['username']) || empty($_POST['password'])){
                              echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                              die();
                            }else{
                              $username = mysqli_real_escape_string($conn, $_POST['username']);//mysqli_real_escape_string yr use hota hai secure ke liye matlab koi hack na kar sake
                              $password = md5($_POST['password']);

                              $sql = "SELECT user_id, username, role FROM user WHERE username = '{$username}' AND password= '{$password}'"; // WHERE ke bad hume match krana hai ek hai user_name aur ek hai password AND (matlab dono condition match krana hai)


                              // die();

                              $result = mysqli_query($conn, $sql) or die("Query Failed.");

                              if(mysqli_num_rows($result) > 0){ // ye query check krega  record aaya ya mila ya nahi

                                while($row = mysqli_fetch_assoc($result)){// jisake ander humara sara data hai matlab $RESULT me o ek array ban gya hai kyoki use ke ander multiple value aa gyi hai aur us array ko show karne ke liye while ka use krte hai

                                  session_start();//seassion ka use temporary data save karne kr liye kiya jata hai aur ye jo data o ye jo temporary data hai o server pe hi save hota hai
                                  $_SESSION["username"] = $row['username'];
                                  $_SESSION["user_id"] = $row['user_id'];
                                  $_SESSION["user_role"] = $row['role'];

                                  header("Location: {$hostname}/admin/post.php");
                                }

                              }else{
                              echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                            }
                          }
                          }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
