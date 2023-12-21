
<?php include('partilas/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br />

                <?php
                    if(isset($_SESSION['login']))
                {

                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>

               <div class="col-4 text-center">

                <?php
                //
                $sql = "SELECT * FROM tbl_category";
                //
                $res = mysqli_query($conn, $sql);
                //
                $count = mysqli_num_rows($res);
                
                ?>

                <h1>5</h1>
                <br />
                Categories
               </div>

               <div class="col-4 text-center">
                <h1>4</h1>
                <br />
                Foods
               </div>

               <div class="col-4 text-center">
                <h1>3</h1>
                <br />
                Total Orders
               </div>

               <div class="col-4 text-center">
                <h1>Rs.2700.00</h1>
                <br />
                Revenue Generated
               </div>

               <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main content Section Ends -->

<?php include('partilas/footer.php'); ?>