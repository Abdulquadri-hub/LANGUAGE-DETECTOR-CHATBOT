<?php
require("config.php");

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "chatbot");

/*
*database connection
*/

$conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if (!$conn) 
{
    die("Connection failed:". mysqli_connect_error());
}

if(count($_POST) > 0)
{
    $userInput = $_POST['message'];
    $count = count(explode(" ", $userInput));

    $stopwords = ["what", "define", "this", "is", "message", "POST", "post", "according", "actually", "about", "as", "ask", "eg"];

    for ($i=0; $i < $count; $i++) 
    { 
        $sentences = (explode(" ", $userInput));
        
    }

    $reply = preg_replace(array("/[();=.,-_%+''$#%*@^]/"), "", implode(" ", array_diff($sentences, $stopwords))); 

    // read from database
    $query = "select * from chatbot where keywords like '%$reply%'";
    $result = mysqli_query($conn, $query) or die("Error");

            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $language = $row['programming_language'];
                    echo $language;
                }
            } else 
            {
                echo "Sorry cannot understand you";
            }
}

