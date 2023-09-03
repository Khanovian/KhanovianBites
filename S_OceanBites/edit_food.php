<?php
session_start();
include("db.php");

$food_id = $_REQUEST['id'];

$result = mysqli_query($con, "SELECT `image`,`food_name` ,`food_price`,`description` FROM `foodie` where id='$food_id'") or die("Query 1 incorrect.......");

list($pic_name,$food_name,$food_price,$description) = mysqli_fetch_array($result);

if (isset($_POST['btn_save'])) {
    $food_name = mysqli_real_escape_string($con, $_POST['food_name']);
    $food_price = mysqli_real_escape_string($con, $_POST['food_price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
  

    $picture_name = $_FILES['picture']['name'];
    $picture_type = $_FILES['picture']['type'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_size = $_FILES['picture']['size'];

    if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
        if ($picture_size <= 50000000) {
            $pic_name = time() . "_" . $picture_name;
            move_uploaded_file($picture_tmp_name, "../img/" . $pic_name);

            $update_query = "UPDATE `foodie` SET `id`='$food_id',`image`='$pic_name',`food_name`='$food_name' ,`food_price`='$food_price' ,`description`='$description' WHERE id = '$food_id'";

            if (mysqli_query($con, $update_query)) {
                header("location: food.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "File size should be less than or equal to 1GB.";
        }
    } else {
        echo "Invalid file type. Only JPEG, JPG, PNG, and GIF images are allowed.";
    }

    mysqli_close($con);
}


?>

<!-- Rest of your HTML code for form display -->

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
          <div class="row">
                
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h5 class="title">Edit Sports</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          
                            <div class="col-md-4">
                                <img src='<?php echo "../img/" . $pic_name ?>' style='width:80px; height:60px; border:groove #000'>
                                <div class="">
                                    <label for="">Change Image</label>
                                    <input type="file" name="picture" class="btn btn-fill btn-success" id="picture">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="title" required name="food_name" value="<?php echo $food_name; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" id="food_price" required name="food_price" value="<?php echo $food_price; ?>" class="form-control">
                                </div>
                            </div>
                           
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Details</label>
                                    <input type="text" id="description" required name="description" value="<?php echo $description; ?>" class="form-control">
                                </div>
                            </div>

                         

                            <div class="card-footer">
                                <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </form>
        </div>
      </div>
