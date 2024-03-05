<?php
include "db_conn.php";
$id = $_GET['id'];

if(isset($_POST['submit'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id=$id";
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
        <h3>Edit User information</h3>
        <p><b>Click update after changing any information</b></p>

        <?php

        $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        
        ?>

        <div class="container-box">
            <form action="" method="POST">
                <div class="row">
                    <div class="col">
                        <label>First Name:</label>
                        <input type="text" class="form-input" name='first_name' id='first_name' value=<?php echo $row['first_name']?>>
                    </div>
                    <div class="col">
                        <label>Last Name:</label>
                        <input type="text" class="form-input" name='last_name' id='last_name' value=<?php echo $row['last_name']?>>
                    </div>
                    <div class="col">
                        <label>Email:</label>
                        <input type="email" class="form-input" name='email' id='email' value=<?php echo $row['email']?>>
                    </div>
                    <div class="col">
                        <input type="radio" class="form-input" name='gender' id='male' value='male' <?php echo ($row['gender']=='male')?"checked":''; ?>>
                        <label for="male">Male</label>
                        <input type="radio" class="form-input" name='gender' id='female' value='female' <?php echo ($row['gender']=='female')?"checked":''; ?>>
                        <label for="female">Female</label>
                    </div>

                    <div>
                        <button type="submit" name='submit'>Update</button>
                        <button><a href="index.php">Cancel</a></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>
</html>