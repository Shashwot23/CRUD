
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <style>
        body{
            text-align: center;
            align-items: center;
            display: grid;
            margin-top: 5%;
        }
        table, th, td {
            border: 1px solid;
            margin: 0 10%;
            margin-top: 10px;
        }
        a{
            text-decoration: none;
            margin: 10px 0;
        }
        a:hover { 
            color: red; 
        } 
    </style>
</head>
<body>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Gender</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db_conn.php";

            $sql = "SELECT * FROM `crud`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['gender'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']?>">edit</a>
                        <a href="delete.php?id=<?php echo $row['id']?>">delete</a>
                    </td>
            </tr>
                <?php
            }
            ?>
            
        </tbody>
    </table>
    <a href="add_new.php">Add New</a>
</body>
</html>