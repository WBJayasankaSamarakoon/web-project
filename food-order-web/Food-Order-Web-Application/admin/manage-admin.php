<?php include('partilas/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

        <br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Displaying Session Message
            unset($_SESSION['add']); // Removing Session Message
        }
        ?>

        <br /><br />

        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br /><br />

        <table class="tbl-full">
            <tr>
                <th>B.J.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            // Query to Get all Admin
            $sql = "SELECT * FROM tbl_admin";
            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Check whether the query is executed or not
            if ($res == TRUE) {
                // Count rows to check whether we have data in the database or not
                $rows = mysqli_num_rows($res); // Function to get all the rows in the database

                $sn = 1; // Initialize $sn here

                // Check the number of rows
                if ($rows > 0) {
                    // We have data in the database
                    while ($rows = mysqli_fetch_assoc($res)) {
                        // Using a while loop to get all the data from the database
                        // And the while loop will run as long as we have data in the database

                        // Get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username']; // Fix typo here

                        // Display the values in our table
                        ?>

                        <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

                        <?php
                    }
                } else {
                    // We do not have data in the database
                    // Handle the case where there is no data
                }
            }
            ?>

        </table>

    </div>
</div>
<!-- Main content Section Ends -->

<?php include('partilas/footer.php'); ?>
