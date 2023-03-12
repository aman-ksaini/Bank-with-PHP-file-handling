<?php
include 'header.php'; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/customer_profile_deposite.css">
    <title>Deposite</title>
</head>

<body>
    <?php
    $dir = $_GET["id"];
    $f = fopen("./data/" . $dir . "/transaction.txt", 'r');
    $rd = fread($f, filesize("./data/" . $dir . "/transaction.txt"));
    $tr = explode(",", $rd);
    $len = count($tr);
    $bal = intval($tr[$len - 1]);
    ?>
    <div class="cont">
        <form method="post">
            <input type="text" name="amount" placeholder="Enter your amount" />
            <input type="text" name="crfm_amount" placeholder="Confirm amount" />
            <input type="password" name="password1" placeholder="password" />
            <input type="submit" value="submit" name="cnfrm_submit">
        </form>
        <?php
        date_default_timezone_set("Asia/Calcutta");
        $tdy = date("Y-m-d h:i:sa");
        if (isset($_POST["cnfrm_submit"])) {
            $add = (int) $_POST['amount'];
            $add2 = (int) $_POST["crfm_amount"];
            if ($add != $add2) {
                echo "Amount have to be same";
            } else {
                $newbal = (int) $add + (int) $bal;
                $f = fopen("./data/" . $dir . "/transaction.txt", 'a');
                fwrite($f, "\n" . $tdy . "," . "TID" . rand() . "," . "Self Deposite" . "," . "$add" . "," . "_" . "," . $newbal);
                echo '<script>alert("Balance Deposited Successfully")</script>';
            }
        }
        ?>  
    </div>
</body>

</html>
<?php
include 'footer.php';

?>