<?php
    class Session 
    {
        function signup($username, $email, $pwd1, $pwd2)
        {
            include("database_connection.php");

            $query = "SELECT * FROM user WHERE Email = '" . $email . "' OR User = '" . $username . "'";

            $statement = $connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();

            if($count > 0)
            {
                return;
            }

            $hash = md5( rand(0,1000) );

            $query = "INSERT INTO user(User, Pwd1, Pwd2, IdUserType, Email, Verihash) VALUES ('" . $username . "', '" . $pwd1 . "', '" . $pwd2 . "', 2, '" . $email . "', '" . $hash . "')";

            $statement = $connect->prepare($query);
            $statement->execute();

            header("location:../Login.php");
        }
    }
?>