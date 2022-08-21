<?php
     $con = mysqli_connect('localhost','root','','detail');
    if(!$con)
    {
        echo "Not connect";
    }
    $price = $_POST["price"];
    $time = $_POST["time"];
    $theator = $_POST["theator"];
    $user="nimal";
    $movie="spider man";

    if(isset($_POST['seat']))
    {
        $seat = implode(',',$_POST['seat']);
        //$subject=implode(',',$_POST['subject']);
    }

    

    $result = mysqli_query($con,"INSERT INTO `seatbooking`(`userName`,`movie`,`theators`,`time`,`seat`) VALUES('$user','$movie','$theator','$time','$seat')");
    if(!$result)
    {
        echo "no insertion";
    }

    
?>
