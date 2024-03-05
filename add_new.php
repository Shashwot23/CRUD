<?php
include "db_conn.php";


if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) 
            VALUES (NULL,'$first_name','$last_name','$email','$gender')";
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php");
    }else{
        echo 'failed:'.mysqli_connect_error($conn);
    }

}
?>


<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        body{
            text-align: center;
            
        }
        .container{
            background-color: aqua;
            width:60%;
            margin: auto;
        }
        .container h3{
            background-color: cornflowerblue;
            padding: 10px;
        }
        .col{
            padding:10px;
        }
        .form-input{
            border: none;
            border-radius: 10px;
            padding: 5px;
        }
        button{
            margin-bottom: 10px;
            background-color:blue;
            color: white;
        }
        button a{
            text-decoration: none;
            color: white;
        }
        button:hover{
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>CRUD system in php</h1>

    <div class="container">
        <h3>Add New User</h3>
        <h2>Complete the form</h2>
        <div class="container-box">
            <form action="" method="POST">
                <div class="row">
                    <div class="col">
                        <label>First Name:</label>
                        <input type="text" class="form-input" name='first_name' placeholder='Your Name'>
                    </div>
                    <div class="col">
                        <label>Last Name:</label>
                        <input type="text" class="form-input" name='last_name' placeholder='Your Lastname'>
                    </div>
                    <div class="col">
                        <label>Email:</label>
                        <input type="email" class="form-input" name='email' placeholder='Your Email'>
                    </div>
                    <div class="col">                 
                        <input type="radio" class="form-input" name='gender' id='male' value='male'>
                        <label for="male">Male</label>
                        <input type="radio" class="form-input" name='gender' id='female' value='female'>
                        <label for="female">Female</label>
                    </div>

                    <div>
                        <button type="submit" name='submit'>Save</button>
                        <button><a href="index.php">Cancel</a></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>
</html>