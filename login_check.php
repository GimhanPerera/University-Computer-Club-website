<?php
    include_once "databace_connection.php";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }  

        $username = validation(mysqli_real_escape_string($connection,$_POST['user_name']));
        $password = validation(mysqli_real_escape_string($connection,$_POST['pwd']));
        if(empty($username)){
            header("Location: login.php?error=Email is required");
            exit();
        }
        else if(empty($password)){
            header("Location: login.php?error=Password is required");
            exit();
        }
        else if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
            header("Location: login.php?error=Invalid email format");
            exit();
        }
        else if(strlen($username) > 50){
            header("Location: login.php?error=Email address is too long");
            exit();
        }
        else{
            $sql = "select * from login where username='$username' AND password='$password'";
            $result = mysqli_query($connection,$sql);
            $count = mysqli_num_rows($result);
            if($count==1)
            {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if($row['username'] === $username && $row['password'] === $password){
                    header("Location:loginSuccessPage.html");
                }else{
                    header("Location: login.php?error=Wrong email or password");
                    exit();
                }
                 
            }
            else{
                header("Location: login.php?error=Wrong email or password");
                exit();
            }
        }
        



        /*
        $username = $_POST['user_name'];
        $password = $_POST['pwd'];

        $sql = "select * from login where username='$username' AND password='$password'";

        $result = mysqli_query($connection,$sql);

        if(!$result)
        {
            echo "Query does not work.".mysqli_error($connection);
        }
        


        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


        $count = mysqli_num_rows($result);

        if($count==1)
        {
            header("Location:loginSuccessPage.php");
        }
        else
        {
            echo
            '<script>
                alert("Login Failed. Invalid Username and Password")
            </script>';
        }
        */
    }else{
        header("Location: login.php");
        exit();
    }
?>