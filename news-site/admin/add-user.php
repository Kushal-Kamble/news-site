<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
if(isset($_POST['save'])){
  include "config.php";// 
  // $conn = mysqli_connect("localhost","root","","news_site") or die("connection faild : " .mysqli_connect_error()); exact batayega ki ky error hai
  

  $fname =mysqli_real_escape_string($conn,$_POST['fname']);
  $lname = mysqli_real_escape_string($conn,$_POST['lname']);
  $user = mysqli_real_escape_string($conn,$_POST['user']);
  $password = mysqli_real_escape_string($conn,md5($_POST['password']));
  $role = mysqli_real_escape_string($conn,$_POST['role']);

  $sql = "SELECT username FROM user WHERE username = '{$user}'";

  // echo $sql = "SELECT username FROM user WHERE username = '{$user}'";

  // die("Query Failed: " . mysqli_error($conn)); // agar query fail ho jaaye to error message dega  age ka code run na ho

  $result = mysqli_query($conn, $sql) or die("Query Failed.");

  if(mysqli_num_rows($result) > 0){
    echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";//user pehle login kar chuka hai to use ye error dega ki username already exits
  }else{
    $sql1 = "INSERT INTO user (first_name,last_name, username, password, role) 
              VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')"; //user => database table name hai aur first_name ye column name hai
    if(mysqli_query($conn,$sql1)){//upar wali query ko run karne ke liye if condiation ka use kiya hai 
      header("Location: {$hostname}/admin/users.php");//${$hostname} variable name baar baar likhna na pade aur use config.php file me deaclare karna hai 
      // header("Location: http://localhost/news-site/admin/users.php")
    }else{
      echo "<p style='color:red;text-align:center;margin: 10px 0;'>Can't Insert User.</p>";
    }
  }
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start  => superglobal variable  $_SERVER['PHP_SELF'] eska matlab page esi page pe load hoga -->
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                    <!-- after click a save button go to if(isset($_POST['save'])) and check ki button press hoova hai ya nhi or  data aaya hai ya nahi -->
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>