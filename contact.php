<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    input{
      max-width: 60%;
      margin : 0 auto;
    }
    
    
    </style>

    <title>iDicuss - Coding Forums</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"?>
    <?php include "partials/_header.php"?>

    <?php
    
    $showAlert = false;
    $showError = false;
    $method =$_SERVER["REQUEST_METHOD"];
    if($method=='POST'){
        //insert contact info into db
        $contact_email = $_POST['contact_email'];
        $contact_address = $_POST['contact_address'];
        $contact_subject = $_POST['contact_subject'];
        $contact_message = $_POST['contact_message'];
        
        $sql = "INSERT INTO `contacts` (`contact_email`, `contact_address`, `contact_subject`, `contact_message`, `contact_date`) VALUES ('$contact_email', '$contact_address', '$contact_subject', '$contact_message', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> we will be back to you as soon as possible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        if($showError){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Something went wrong.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>
    
    

    <div class="container my-4 text-center ">
    <h1 class="my-4">Contact Us</h1>
        <form action="contact.php" method="post" >
            <div class="form-row ">
                <div class="form-group col-md-12">
                    <label for="contact_email">Email</label>
                    <input type="email" class="form-control" id="contact_email" name="contact_email" placeholder="Email" required>
                </div>
                
            </div>
            <div class="form-group">
                <label for="contact_address">Address</label>
                <input type="text" class="form-control" id="contact_address" name="contact_address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="contact_subject">Subject</label>
                <input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Enter Subject">
            </div>
            <div class="form-group">
                <label for="contact_message">message</label>
                <input type="text" class="form-control" id="contact_message" name="contact_message" placeholder="Enter Message">
            </div>
            
            
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>

    <?php include "partials/_footer.php"?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>