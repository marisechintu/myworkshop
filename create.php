<?php
    include("connection.php");
$name="";
$Email="";
$phoneNumber="";
$address="";
$errorMessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name=$_POST["name"];
    $Email=$_POST["Email"];
    $phoneNumber=$_POST['phoneNumber'];
    $address=$_POST["address"];

    do {
        if (empty($name) || empty($Email) || empty($phoneNumber) || empty($address)) {
            $errorMessage = "All fields are required!";
            
            break;
        }

        $sql ="insert into client(name,Email,phoneNumber,address)values('$name','$Email',$phoneNumber,'$address')";

        $result=$conn->query($sql);

        if(!$result){
             $errorMessage="invalid query".$conn->error;
             break;

        }
          
        $name="";
        $Email="";
        $phoneNumber="";
        $address="";
        
        $successMessage = "Client created successfully!";
       

        header("location: /myworkshop/index1.php");
        exit;

    
    

    } while (false);
}
?>
<?php if (!empty($errorMessage)){
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' style='font-weight: 900; text-align:center'>
            <strong> $errorMessage </strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
     ";
    }
    ?>

    <!-- Success Alert -->
    <?php if (!empty($successMessage)){
        echo "
        <div class='alert alert-success alert-dismissible fade show' role='alert' style='font-weight: 900; text-align:center'>
            <strong> $successMessage </strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
     ";
    }
    ?>

   






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new client</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
</head>
<body>
    <div class="container">
        <h1> New Client</h1>
    <form id="clientForm" name="clientForm" method="post" onsubmit=" return validateForm()">
        <div class="row mb-3 col-sm-3 col-form-lable">
           <div class="col sm-6">
            Name:<input type ="text" class="form-control" name="name" value="<?php echo"$name"?>">
            </div>
            </div>
           
         <div class="row mb-3 col-sm-3 col-form-lable">
           <div class="col sm-6">
            Email:<input type ="email" class="form-control" name="Email" value="<?php echo"$Email"?>">
            </div>
        </div> 
        <div class="row mb-3 col-sm-3 col-form-lable">
           <div class="col sm-6">
            phoneNumber:<input type ="phonenumber" class="form-control" name="phoneNumber" value="<?php echo"$phoneNumber"?>">
            </div>
        </div> 
        <div class="row mb-3 col-sm-3 col-form-lable">
           <div class="col sm-6">
            Address:<input type ="text" class="form-control" name="address" value="<?php echo"$address"?>">
            </div>
        </div> 
          
        <button type="submit"  class="btn btn-primary"> submit</button>
        <a class="btn btn-danger" href="/myworkshop/index1.php">cancel</a>

        
</form>

</div>
<script>
    function validateForm() {
        //event.preventDefault(); 
        
        
        let name = document.forms["clientForm"]["name"].value.trim();
        let email = document.forms["clientForm"]["Email"].value.trim();
        let phoneNumber = document.forms["clientForm"]["phoneNumber"].value.trim();
        let address = document.forms["clientForm"]["address"].value.trim();

        
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let phonePattern = /^[0-9]+$/;

        
        if (name === "" || email === "" || phoneNumber === "" || address === "") {
            alert("All fields are required!");
            return false;
        }

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address!");
            return false;
        }

        if (!phonePattern.test(phoneNumber)) {
            alert("Phone number should contain only digits!");
            return false;
        }

        if (phoneNumber.length < 10 || phoneNumber.length > 15) {
            alert("Phone number must be between 10 and 15 digits!");
            return false;
        }

        
        document.getElementById("clientForm").submit();
    }
</script>

  
</body>
</html>