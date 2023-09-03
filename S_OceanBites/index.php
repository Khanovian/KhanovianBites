<style>
    :root {
        --gradient: linear-gradient(to left top, #d82020 10%, #531717 90%) !important;
    }

    body {
        background: #111 !important;
        padding: 20px;
    }

    .card-container {
        display: flex; /* Use flexbox to align cards horizontally */
        flex-wrap: nowrap; /* Prevent cards from wrapping to the next line */
        justify-content: space-between; /* Space evenly between cards */
        gap: 20px; /* Add some gap between cards */
        text-align: center;
    }

    .card {
        background: #000000;
        border: 1px solid #000;
        color: #fff;
        width: 30%; /* Set a fixed width for each card */
    }

    .card-title {
        color: #d82020;
        font-size: 24px;
    }

    .card-text {
        font-size: 16px;
    }

    .button-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .card-btn {
        background-color: #d11313;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease;
        margin-right: 10px;
        font-weight: bold;
    }

    .card-btn:hover {
        background-color: #0056b3;
    }

    .card-img-top {
        object-fit: cover;
        height: 270px;
    }
</style>





<br><br>
<br><br>

<div class="container mx-auto mt-4 ">

    <div class="row">
<div class="card-container">
        <?php

        include_once 'db.php';
        $result = mysqli_query($con, "SELECT * FROM foodie");

        while ($row = mysqli_fetch_array($result)) {
            ?>

            <!-- Card -->
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <img src="../img/<?php echo $row["image"]; ?>" class="card-img-top cusimg img-fluid" alt="img"
                        width="320px" height="270px">
                    <div class="card-body">
                        <h2 class="card-title">
                         
                            <?php echo $row["food_name"]; ?>
                        </h2>
                        <h4 class="card-title">
                           
                            <?php echo $row["food_price"]; ?>
                        </h4>

                        <h6 class="card-text"><span>
                                <?php echo $row["description"]; ?>
                            </span></h6>
                        <div class="button-container">
                            <a href="booking.php" class="card-btn">Book Now</a>
                           
                        </div>
                    </div>
                </div>
            </div>
           
            <?php
        }
        ?>
    </div>
</div>
</div>



