<?php
ob_start();
include 'header.php';
$dir = $_GET["id"];
$f1 = fopen("./data/" . $dir . "/details.txt", 'r');
$rd = fread($f1, filesize("./data/" . $dir . "/details.txt"));
$tr = explode(",", $rd);
$name1 = $tr[0];
$f1 = fopen("./data/" . $dir . "/transaction.txt", 'r');
$rd = fread($f1, filesize("./data/" . $dir . "/transaction.txt"));
$tr = explode(",", $rd);
$len = count($tr);
$bal1 = intval($tr[$len - 1]);

?>
<html>

<head>
    <title>Fund Transfer</title>
    <link rel="stylesheet" type="text/css" href="css/fund_transfer.css" />
    <style>
        #customer_profile .link4 {

            background-color: rgba(5, 21, 71, 0.4);

        }
    </style>
</head>

<body>


    <div class="fundtransfer_conainer">

        <br>
        <span>IMPS (24x7 Instant Payment)</span><br><br>


        <form id="form2" method="post">

            <input type="text" name="amount" placeholder="Amount" required><br>
            <input type="text" name="number" placeholder="Contact Number" required><br>
            <input type="text" name="name" placeholder="Name"><br>
            <input type="submit" name="fnd_trns_btn" value="Send"><br>
        </form>

    </div>


</body>
<?php include 'footer.php'; ?>

</html>
<?php
if (isset($_POST["fnd_trns_btn"])) {
    $amt = (int) $_POST["amount"];
    $number = $_POST["number"];
    $name = $_POST["name"];

    $fmob = substr($number, 0, 4);
    $fname = substr($name, 0, 4);
    $frnd = $fmob . "_" . $fname;
    $f2 = fopen("./data/" . $frnd . "/transaction.txt", 'r');
    $rd2 = fread($f2, filesize("./data/" . $frnd . "/transaction.txt"));
    $tr2 = explode(",", $rd2);
    $len2 = count($tr2);
    $bal2 = intval($tr2[$len2 - 1]);

    date_default_timezone_set("Asia/Calcutta");
    $tdy = date("Y-m-d h:i:sa");
    if (!file_exists('./data/' . $frnd)) {
        echo "NO bank Account for this contact number";
    } else {
        if ($amt > $bal1) {
            echo "Does not have enough balance";
        } else {
            $newbal1 = (int) $bal1 - (int) $amt;
            $f1 = fopen("./data/" . $dir . "/transaction.txt", 'a');
            fwrite($f1, "\n" . $tdy . "," . "TID" . rand() . "," . "Transfer to " . $name . "," . "_" . "," . "$amt" . "," . $newbal1);

            $newbal2 = (int) $bal2 + (int) $amt;
            $f2 = fopen("./data/" . $frnd . "/transaction.txt", 'a');
            fwrite($f2, "\n" . $tdy . "," . "TID" . rand() . "," . "Received form " . $name1 . "," . "$amt" . "," . "_" . "," . $newbal2);

            echo '<script>alert("Fund Transfer Successfully")</script>';

        }

    }

}

?>