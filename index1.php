<?php if (isset($_GET['restored'])) { ?>
    <div id="restore-alert" class="alert alert-success text-center">
        Client successfully restored!
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('restore-alert').style.display = 'none';
        }, 3000);
    </script>
<?php } ?>




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
    <h1>List of Clients</h1>
    <a class="btn btn-primary" href="/myworkshop/create.php">New Client</a>
    
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
            <?php 
        include("connection.php");

            $sql = "SELECT * FROM client";
            $result = $conn->query($sql);
            $count=0; 
            while ($row = $result->fetch_assoc()) {
                $count++;
                echo "<tr>
                        <td>{$count}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['phoneNumber']}</td>
                        <td>{$row['address']}</td>
                        <td>
                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' 
                                onclick='fillForm({$row["id"]}, \"{$row["name"]}\", \"{$row["Email"]}\", \"{$row["phoneNumber"]}\", \"{$row["address"]}\")'>
                                Edit
                            </button>
                            <a class='btn btn-danger' href='/myworkshop/delete.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
        
    </div>
    </table>
</div>
<div class="d-flex justify-content-end">
    <a class="btn btn-primary" style="width: 150px;margin:37px" href="/myworkshop/deleteList.php">DeleteList</a>
</div>



<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0000ffa1; color: white; justify-content: center;">
                <h5 class="modal-title">Edit Client</h5>
                
            </div>
            <div class="modal-body">
                <form method="POST" action="edit.php">
                    <input type="hidden" name="id" id="edit-id">
                    
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="edit-name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="Email" id="edit-email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">PhoneNumber:</label>
                        <input type="text" class="form-control" name="phoneNumber" id="edit-phoneNumber" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" class="form-control" name="address" id="edit-address" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
        </div>

<script>
function fillForm(id, name, email, phoneNumber, address) {
    
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-name').value = name;
    document.getElementById('edit-email').value = email;
    document.getElementById('edit-phoneNumber').value = phoneNumber;
    document.getElementById('edit-address').value = address;

    
}

</script>

</body>
</html>

