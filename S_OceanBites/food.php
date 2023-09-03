<?php
session_start();
include("db.php");
error_reporting(0);

// Handle delete action
if (isset($_GET['action']) && $_GET['action'] != "" && $_GET['action'] == 'delete') {
    $food_id = $_GET['id'];

    // Delete player image
    $result = mysqli_query($con, "SELECT image FROM foodie WHERE id='$food_id'") or die("Query is incorrect...");
    list($image) = mysqli_fetch_array($result);
    $path = "../img/$image";

    if (file_exists($path)) {
        unlink($path);
    }

    // Delete player record
    mysqli_query($con, "DELETE FROM foodie WHERE id='$food_id'") or die("Query is incorrect...");
}

// Pagination
$page = $_GET['page'];

if ($page == "" || $page == "1") {
    $page1 = 0;
} else {
    $page1 = ($page * 10) - 10;
}

?>
<style>
     body {
      color: rgb(156, 131, 33);
      background: #f5f5f5;
      font-family: 'Varela Round', sans-serif;
      font-size: 13px;
    }

    .table-responsive {
      margin: 20px 0;
    }

    .table-wrapper {
      background: #fff;
      padding: 20px 25px;
      border-radius: 3px;
      min-width: 970px;
      box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
      padding-bottom: 15px;
      background: #435d7d;
      color: #fff;
      padding: 16px 30px;
      min-width: 100%;
      margin: -20px -25px 10px;
      border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
      margin: 5px 0 0;
      font-size: 24px;
    }

    .table-title .btn-group {
      float: right;
    }

    .table-title .btn {
      color: #fff;
      float: right;
      font-size: 13px;
      border: none;
      min-width: 50px;
      border-radius: 2px;
      border: none;
      outline: none !important;
      margin-left: 10px;
    }

    .table-title .btn i {
      float: left;
      font-size: 21px;
      margin-right: 5px;
    }

    .table-title .btn span {
      float: left;
      margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
      border-color: #e9e9e9;
      padding: 12px 15px;
      vertical-align: middle;
    }

    table.table tr th:first-child {
      width: 200px;
    }

    table.table tr th:last-child {
      width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
      background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
      background: #f5f5f5;
    }

    table.table th i {
      font-size: 13px;
      margin: 0 5px;
      cursor: pointer;
    }

    table.table td:last-child i {
      opacity: 0.9;
      font-size: 22px;
      margin: 0 5px;
    }

    table.table td a {
      font-weight: bold;
      color: #566787;
      display: inline-block;
      text-decoration: none;
      outline: none !important;
    }

    table.table td a:hover {
      color: #2196F3;
    }

    table.table td a.edit {
      color: #45e108;
    }

    table.table td a.delete {
      color: red;
    }

    table.table td i {
      font-size: 19px;
    }

    table.table .avatar {
      border-radius: 50%;
      vertical-align: middle;
      margin-right: 10px;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="col-md-14">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Manage Food</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive ps">
                        <table class="table tablesorter" id="page1">
                            <thead class="text-primary p-5">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>
                                        <?php
                                        if ($_SESSION['role'] != 'e') {
                                            echo '<a class="btn btn-primary" href="add_food.php">Add New</a>';
                                        }
                                        ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "SELECT `id`, `image`, `food_name`, `food_price`,`description` FROM `foodie` ") or die("Query incorrect...");
                                while (list($food_id, $image, $food_name,$food_price,$description) = mysqli_fetch_array($result)) {
                                    $substr_name = substr($food_name, 0, 36);
                                    echo "<tr>
                                            <td><img src='../img/$image' style='width: 50px; height: 50px; border: groove #000'></td>
                                            <td>$food_name</td>
                                            <td>$food_price</td>
                                            <td>$description</td>
                                            <td>";

                                    if ($_SESSION['role'] != 'e') {
                                        echo "<a class='btn btn-success' href='edit_food.php?id=$food_id'>Edit</a>
                                              <a class='btn btn-danger' href='food.php?id=$food_id&action=delete'>Delete</a>";
                                    }

                                    echo "</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- Scrollbar elements -->
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
