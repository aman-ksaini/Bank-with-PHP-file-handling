<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $fmob = substr($phone, 0, 4);
	$fname = substr($name, 0, 4);
	$dir = $fmob . "_" . $fname;
    if (file_exists('./data/' . $dir)) {
        
        $f=fopen('./data/'.$dir.'/login.txt',"r");
        $rd=fread($f,filesize('./data/'.$dir.'/login.txt'));
        $user=explode(",", $rd);
        if($password!=$user[1]){
            echo '<script>alert("Wrong Password")
            location="./customer_login.php"</script>';
        }
        else{
            
            echo ("<script>window.location.href='customer_profile.php?dir=$dir'</script>");
        }

    }
    else{
        echo '<script>alert("You do not have any account")</script>';
    }




    ?>
</body>
</html>