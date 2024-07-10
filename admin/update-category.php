<?php include "header.php";
if(isset($_POST["submit"])){
    include"config.php";
    $categoryid = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $categoryname = mysqli_real_escape_string($conn, $_POST['cat_name']);
  

    //$password = mysqli_real_escape_string($conn,md5($_POST['password']));

 
     $sql= "UPDATE category SET category_id='{$categoryid}', category_name = '{$categoryname}'  WHERE category_id = '{$categoryid}'";
    //  $sql1 = "UPDATE category SET category_id='{$_POST['cat_id']}', category_name='{$_POST['cat_name']}'  WHERE  category_id={$_POST['cat_id']}";
    
     
     if(mysqli_query($conn, $sql) ){
         header("Location: {$hostname}/admin/category.php");
     }
   }
 


?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php 
                include "config.php";
                $category_id = $_GET['id'];
                 $sql = "SELECT * FROM category WHERE category_id = {$category_id}";
               $result = mysqli_query($conn, $sql) or exit("query failed");
               if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)) {

                
                ?>
                  <form action="" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo  $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo  $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php }} ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
