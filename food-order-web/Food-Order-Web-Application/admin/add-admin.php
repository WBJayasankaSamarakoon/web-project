<?php include('partilas/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br />

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);//Removing session message
            }
        ?>

        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <br />
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partilas/footer.php'); ?>

<?php
// Database Connection
$conn = mysqli_connect('localhost', 'root', '', 'food-order');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check whether the form is submitted
if(isset($_POST['submit']))
{
    //1. Get the Data from the form
    $full_name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
    $username = isset($_POST["username"]) ? $_POST["username"] : '';
    $password = md5($_POST["password"]) ? md5($_POST["password"]) : '';
    //echo $full_name, $username, $password;


    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
            ";

    //3. Execte Query and save data into database
    $coon = mysqli_connect('localhost', 'root', '') or die(mysqli_error());//Database connection
    $db_select = mysqli_select_db($coon, 'food-order') or die(mysqli_error());//Selecting database 

    //3. Execte Query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the (query is executed) data is inserted or not and display appropriate message
    if($res==TRUE)
    {
       //Data inserted
       //echo"Data Inserted"; 
       //Create a session variable to display message
       $_SESSION['add'] = "Admin Added Successfully";
       //Redirect page to manage admin
       header("location:".SITEURL. 'admin/manage-admin.php');
    }

    else
    {
        //Failed to insert data
        //echo"Faile to Insert Data";
        //Create a session variable to display message
       $_SESSION['add'] = "Failed to Add Admin";
       //Redirect page to add admin
       header("location:".SITEURL. 'admin/add-admin.php');
    }



}
?>
