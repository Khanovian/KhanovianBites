<?php
session_start();
include("db.php");

function redirect($url)
{
    echo "<script>window.location.href = '$url';</script>";
    exit();
}
if (isset($_POST['btn_save'])) {
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $description = $_POST['description'];

    // Picture upload
    $picture_name = $_FILES['picture']['name'];
    $picture_type = $_FILES['picture']['type'];
    $picture_tmp_name = $_FILES['picture']['tmp_name'];
    $picture_size = $_FILES['picture']['size'];

    if ($picture_type == "image/jpeg" || $picture_type == "image/jpg" || $picture_type == "image/png" || $picture_type == "image/gif") {
        if ($picture_size <= 50000000) {
            $pic_name = time() . "_" . $picture_name;
            move_uploaded_file($picture_tmp_name, "../img/" . $pic_name);

            // Use prepared statement to prevent SQL injection
            $insert_query = "INSERT INTO `foodie`(`image`, `food_name`, `food_price`, `description`) VALUES (?, ?, ?, ?)";
            
            $stmt = mysqli_prepare($con, $insert_query);
            
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssss", $pic_name, $food_name, $food_price, $description);
                
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script type='text/javascript'>alert('Added successfully.'); window.location.href = 'food.php?success=1';</script>";
                    exit; // Exit after redirect to prevent further code execution
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            } else {
                echo "Error in preparing the statement: " . mysqli_error($con);
            }
        } else {
            echo "File size should be less than or equal to 1GB.";
        }
    } else {
        echo "Invalid file type. Only JPEG, JPG, PNG, and GIF images are allowed.";
    }
}


?>
<style>
    
</style>
<!-- Rest of your HTML and form code here -->
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <form action="" method="post" type="form" name="form" enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h5 class="title">Add New</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <label for="">Add Image</label>
                                    <input type="file" name="picture" required class="btn btn-fill btn-success"
                                        id="picture">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="food_name" required name="food_name"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" id="food_price" required name="food_price"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text" id="description" required name="description"
                                        class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save" required
                            class="btn btn-fill btn-primary">Add New</button>
                    </div>
                </div>
            </div>
    </div>
</div>
</form>

</div>
</div>
