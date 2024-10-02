<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="index.css">
</head>

<body bgcolor="#f9f02b">
    <?php
      
        $nameErr=$emailErr=$NumErr=$VillErr=$GenErr=$TicketErr=$commentErr="";
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
            $conn=mysqli_connect('localhost','root','','lora');
            $name=$_POST["name"];
            $email=$_POST["email"];
            $mobile=$_POST["number"];
            $tickets=$_POST["tickets"];
            $village=$_POST["village"];
            $gender=$_POST["gender"];
            $comment=$_POST["comment"];
            
            $stmt = $conn->prepare("INSERT INTO `task` (`UserName`, `MobileNumber`,`village`,`Gender`,`Tickets`,`Email`,`coments`) VALUES (?, ?,?,?,?,?,?)");
            $stmt->bind_param("sississ", $name, $mobile,$village,$gender,$tickets,$email,$comment); 
            if ($stmt->execute()) {
               $nameErr="Successfully Entered!";
               function name(){
                $nameErr="";
               }
              
                
            } else {
                $nameErr= "Something went wrong!";
                
            }
        }
    ?>
    <div class="container">

        <h1 id="heading">Ticket Counter</h1>
    </div>
    <h3 id="res"><?php echo $nameErr;?></h3>
    <div class="box">
        <form action="<?php $_PHP_SELF ?>" method="post">
            
            <input type="text" placeholder="Enter Your Name..." class="input" name="name"><br>
            <input type="email" placeholder="Enter Email..." class="input" name="email"><br>
            <input type="text" placeholder="Enter your mobile number...." class="input" name="number"><br>
            <input type="number" placeholder="No of tickets you want to book.." class="input" name="tickets">
            <input type="text" placeholder="Enter Your Village Name..." class="input"

                name="village"><br>
            <div class="gender">

                Gender:<input type="radio" value="female" name="gender">Female
                <input type="radio" value="male" name="gender">Male
            </div>
            <textarea name="comment" id="comment" placeholder="comments.."></textarea>
            <input type="submit" name="submit" value="Submit" id="button">
        </form>

    </div>
</body>

</html>