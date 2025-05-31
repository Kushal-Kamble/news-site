1...USER.PHP sequence vise code to better understand

2...add-user.php

3...update-user.PHP

4...delete-user.PHP

5...(pagination)   users.php


6...(login)   index.php


7...header.php ki user ko sabse pehle lohin page dikhe

<?php
  include "config.php";
  session_start();

  if(!isset($_SESSION["username"])){ // agar es variable name ka koi session set nhi hai to me use redirect kar dunga
    header("Location: {$hostname}/admin/");
  }
?>

8...index.php


<?php
  include "config.php";
  session_start();

  if(isset($_SESSION["username"])){
    header("Location: {$hostname}/admin/post.php");//agar username set hai matlab user already lohin hai  to  redect ho jaye post.php file me
  }
?>


<?php
    if($_SESSION["user_role"] == '1'){// sirf admin ko category and users setting ke option dikhenge
?>


9... user.php


<?php 
       if($_SESSION["user_role"] == '0'){ // normal user name dalke dusre page par na ja sake esliye sab page par ye lagana hai starting me
       header("Location: {$hostname}/admin/post.php"); 
}?>



10....add-post.php

11.... save_post.php

12...update-post.php

13... save-update.php


14....delete-post.php

<?php unlink("upload/".$row['post_img']);//kisibhi file ko hum folder se delete karna chahte hai tab eska use hota hai?>



15...index.php main wali  (copy post.php code)

16...single.php  (not admin wali file)

17.... header.php


18...category.php

19.... header.php

20...index.php

21....single.php

22...auther.php

23..search.php

24...sidebar.php (recent-post.php)

25... header.php (static tile --- dyanamic title show on top)


26...setting.php  (go to update-post.php)

27... save-setting.php (copy code save update post)

28... go to header.php

29...save-update-post.php


30...update-post.php

31...add-post.php

32...save-post.php

33...post.php

34..index.php













MY SQL KE SATH KAM KRNE KE LIYE BASICALLY 3 STEPS KO FOLLOW KRNA PDTA HAI 




1 STEPS =>  CONNECTION  (PHP AUR MYSQL KA CONNECTION BNANA PDTA HAI)

2 STEPS => RUN SQL QUERY ( CREATE , INSERT , UPDATE , DELETE)

3 STEPS => CLOSE CONNNECTION 


************************************************************************************************************


1 STEPS => CONNNECTION 

mysqli_connnect(server_name, user_name, password, database_name);


************************************************************************************************************


2 STEPS => RUN SQL QUERY 

mysqli_query(connnection_name, sql_query);


************************************************************************************************************


3 STEPS => CLOSE CONNNECTION 

mysqli_close(connnection_name);


************************************************************************************************************





*********************************************************************************************************

<?php


// mysqli_connect(Server Name, User Name, Password, Database Name)
     
// 1. CONNECTION  => $conn = mysqli_connect("localhost","root","","crud") or die("connection fail");  // $conn IS A VARIABLE
 
// 2. RUN SQL QUERY => mysqli_query(Connection Name , SQL Query)
     
// 3. Closed Connection => mysqli_close(Connection Name)
 
include 'config.php';
 
$sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid"; // * SARA KA SARA DATA SELECT KARNA






$result = mysqli_query($conn,$sql) or die("mysqli_query failed");// is Query se jo result nikalke aayega usko show karna hai table ke ander usko store karne ke liye ke yaha me variable lena hai uska nam kuch bhi rakh sakte hai $RESULT


// **************************************************************************************************************



if(mysqli_num_rows($result) > 0) {// YE CHECK KRTA HAI KITNE NUMBER OF ROWS HUME DATABASE SE MILE HAI


// **************************************************************************************************************

while ($row = mysqli_fetch_assoc($result)) { // jisake ander humara sara data hai matlab $RESULT me o ek array ban gya hai kyoki use ke ander multiple value aa gyi hai aur us array ko show karne ke liye while ka use krte hai





// **************************************************************************************************************

<input type="submit" name="submit" class="btn btn-primary" value="Update" required />

// <!-- name="submit" name submit par mujhe code bnana pdega -->

if(isset($_POST['submit'])) {}// button press hoova hai ki nahi agar press hoova to is if condition me aa jayega

// agar submit set ho jaye tabhi eske ander aana matlab click hoova tab eske andar aa jaye

// $conn = mysqli_connect("localhost", "root", "", "crud") or die("connection fail");  // $conn IS A VARIABLE



// **************************************************************************************************************

// ERP => ENTERPRICE REASORCE PLANNING


// WHAT ID CMS => CONTENT MANAGMENT SYSTEM 

// admin =>  ke andar backend se related sari file rahti hai


// **************************************************************************************************************

$conn = mysqli_connect("localhost","root","","news_site") or die("connection faild : " .mysqli_connect_error()); ////exact batayega ki ky error hai

//**************************************************************************************************************

session_start();//seassion ka use temporary data save karne kr liye kiya jata hai aur ye jo data o ye jo temporary data hai o server pe hi save hota hai

//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************
//**************************************************************************************************************


?>








