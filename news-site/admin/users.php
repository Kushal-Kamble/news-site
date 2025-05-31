<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12"> 
                <?php
                  include "config.php"; // database configuration => sabse pahle connection banana hai

                  /* Calculate Offset Code */

                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }

                  // formola

                  // offset = (Page Number -1 ) * Limit

                  // example 

                  // offset = (1 -1 ) * 3 = 0

                  // offset = (2 -1 ) * 3 = 3

                  // offset = (3 -1 ) * 3 = 6



                  $offset = ($page - 1) * $limit;
                  /* select query of user table with offset and limit */ 

                  $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";// user ka sara table dikhana hai  DESC DESENDING ORDER MEANS JO LATEST HAI O SABSE UPAR  AA JAYE
                  $result = mysqli_query($conn, $sql) or die("Query Failed."); //UPAR WALE QUERY KO RUN KARNE KE LIYE $RESULT VARIABLE KA USE KARNA HAI
                  /// is Query se jo result nikalke aayega usko show karna hai table ke ander usko store karne ke liye ke yaha me variable lena hai uska nam kuch bhi rakh sakte hai $RESULT
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {//// jisake ander humara sara data hai matlab $RESULT me o ek array ban gya hai kyoki use ke ander multiple value aa gyi hai aur us array ko show karne ke liye while ka use krte hai
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['first_name'] . " ". $row['last_name']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td><?php
                                  if($row['role'] == 1){
                                    echo "Admin";
                                  }else{
                                    echo "Normal";
                                  }
                               ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }

                // formola

                // offset = (Page Number -1 ) * Limit

                // example 

                // offset = (1 -1 ) * 3 = 0

                // offset = (2 -1 ) * 3 = 3

                // offset = (3 -1 ) * 3 = 6



                // show pagination
                $sql1 = "SELECT * FROM user";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){//ek condition lga di hai ki eske andar ek single record bhi aa jaye to dikha de

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";// jis page par click kiya use page par active rahna
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
