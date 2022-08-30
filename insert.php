<?php

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "chatbot");

// /*
// *database connection
// */

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$conn) 
{
    die("Connection failed:". mysqli_connect_error());
}

// if (count($_POST)) {
//     $explode = explode(",", $_POST['input']);
//     $count = count($explode);
//     $input = implode(" " , $explode);
//     print_r($input);
//     $php = "php";
//     $query = "insert into chatbot set keywords = '$input', programming_language = '$php' ";
//     $result = mysqli_query($conn, $query);
//     if ($result) {
//         $query = "select * from chatbot";
//         $result = mysqli_query($conn,$query);
//         if (mysqli_num_rows($result) > 0) {
//             $row = mysqli_fetch_assoc($result);
//             echo "<pre>";
//             print_r($row);
//         }
//     }
// }
    
            // $query = "select * from chatbot";
            // $result = mysqli_query($conn,$query);
            // if (mysqli_num_rows($result) > 0) {
            //     $row = mysqli_fetch_assoc($result);
            //     echo "<pre>";
            //     print_r($row);
            // }

    // // th following line prevent the browser from passing html
 ?>
<form action="insert.php" method="post">
<input type="text" name="input" id="" >
<button type="submit" name="btn">Insert</button>
</form>
<?php
header('Content-Type: text/plain');
    $reply = $_POST['message'];

    $files = explode(",", file_get_contents("keywords.txt"));
    foreach ($files as $key => $file) 
    {
        if (strchr($file, $reply)) 
        {
            echo $file ;
        }
    }