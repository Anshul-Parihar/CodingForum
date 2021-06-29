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
    .container {
        min-height: 80vh;
    }
    </style>
    <title>iDicuss - Coding Forums</title>
</head>

<body>
    <?php include "partials/_dbconnect.php"?>
    <?php include "partials/_header.php"?>


    <!-- search results -->

    <div class="container my-3">
        <h1>Search Results For - <em>"<?php echo $_GET["search"]; ?>"</em></h1>
        <?php
    $query = $_GET['search'];
    $noResults = true;
    $sql = "SELECT * FROM `threads` WHERE match(thread_title,thread_desc) against('$query')";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $noResults = false;
        $title = $row["thread_title"];
        $desc = $row["thread_desc"];
        $thread_id = $row["thread_id"];
        //display search results
        echo '<div class="result">
            <h3>Go To : <a href="thread.php?threadid='.$thread_id.'" class="text-dark">'.$title.'</a></h3>
            <p>'.$desc.'</p>
        </div>';
    }
    if($noResults){
        echo '<div class="alert alert-danger my-3" role="alert">
            <h4 class="alert-heading">No Results Found!</h4>
            <p>Your search - '.$query.' - did not match any documents.
            </p>
            <hr>
            <p class="mb-0">Suggestions:
            <ul>
            <li>Make sure that all words are spelled correctly.</li>
            <li>Try different keywords.</li>
            <li>Try more general keywords.</li>
            </ul>
            </p>
          </div>';
    }

    
    ?>



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