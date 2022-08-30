<?php


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

    $filename = "keywords.txt";
    $needle = " ";
            $files = file($filename);
            foreach ($files as $key => $file) 
            {
                $arr =  explode($needle, $file);
                if(stristr($file, $reply))
                {
                    if (isset($arr[1]))
                    {
                        $language = " " . ($arr[1]) . " " . ($arr[2])  . " " . ($arr[3]);
                        echo $language . "<b>";
                    }
                }
            }
}

?>