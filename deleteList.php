<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Work</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h1>Delete List of Clients</h1>
   <!-- <a class="btn btn-primary" href="/myworkshop/create.php">New Client</a>-->
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <a class="btn btn-light" href="/myworkshop/index1.php">cancel</a>

            <?php 
            include("connection.php");

            $sql = "SELECT * FROM deletework";
            $result = $conn->query($sql);

           $count=0;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['phoneNumber']}</td>
                        <td>{$row['address']}</td>
                        
                        <td><a class='btn btn-primary' href='/myworkshop/restore.php?id={$row['id']}'>Restore</a>
                        </td>
                        </tr>";
            }
            ?>
        </tbody>
        
    </div>
    </table>
        </body>
</div>
        </html>