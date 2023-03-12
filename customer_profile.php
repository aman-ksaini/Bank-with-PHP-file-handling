<?php
header("refresh: 3");
include 'header.php';
?>
<html>

<head>
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="css/customer_profile.css" />
    <link rel="stylesheet" type="text/css" href="css/customer_profile_header.css" />
</head>

<body>
    <?php
    $Id = $_GET['dir'];
    $f = fopen("./data/" . $Id . "/details.txt", 'r');
    $rd = fread($f, filesize("./data/" . $Id . "/details.txt"));
    $user = explode(",", $rd);
    $name = $user[0];
    $email = $user[3];
    $type = $user[8];
    $f = fopen("./data/" . $Id . "/transaction.txt", 'r');
    $rd = fread($f, filesize("./data/" . $Id . "/transaction.txt"));
    $tr = explode(",", $rd);
    $len = count($tr);
    $bal = intval($tr[$len - 1]);
    


    ?>

    <div class="cust_profile_container">
        <div class="profile_nav">
            <ul>
                <a href='customer_profile_deposite.php?id=<?php echo $Id ?>'>
                    <li class="link1">Deposite</li>
                </a>
                <a href="customer_profile_widthraw.php?id=<?php echo $Id ?>">
                    <li class="link2">Widthraw</li>
                </a>
                <a href="server_down.php">
                    <li class="link3">Change Password</li>
                </a>
                <a href="Fund_transfer.php?id=<?php echo $Id ?>">
                    <li class="link4">Fund Transfer</li>
                </a>
                <a href="server_down.php">
                    <li class="link5">Statement</li>
                </a>
            </ul>
        </div>

        <div class="acc_details">
            <span class="heading">Account Details</span><br>
            <label>Customer Id :<?php echo $Id ?></label>
            <label>Email: <?php echo $email ?></label>
            <label>Account Name : <?php echo $name ?></label>
            <label>Account Type :<?php echo $type ?> </label>
            <label>Available Balance : <?php echo $bal; ?></label>

        </div>
        <div class="statement">
            <label class="heading">Bank Statement</label>
            <table>
                <th width="15%">Date</th>
                <th width="17%">Trans. Id</th>
                <th width="31%">Description</th>
                <th width="10%">Cr.</th>
                <th width="10%">Dr.</th>
                <th width="20%">Total</th>
                <?php
                // $i = 0;
                // echo count($tr);
                // for($i=0;$i<count($tr);$i++) {
                //         echo '
                //             <tr>
                //             <td>' . $tr[$i] . '</td>
                //             </tr>';
                //     $i +6;
                // }
                $f = fopen("./data/" . $Id . "/transaction.txt", 'r');
                while (!feof($f)) {
                    $line = fgets($f);
                    $parts = explode(',',$line);
                    echo '
                            <tr>
                            <td>' . $parts[0] . '</td>
                            <td>' . $parts[1] . '</td>
                            <td>' . $parts[2] . '</td>
                            <td>' . $parts[3] . '</td>
                            <td>' . $parts[4] . '</td>
                            <td>' . $parts[5] . '</td>
                            <td></td>
                            </tr>';

                }
                fclose($f);
                ?>
            </table>
        </div>
    </div>

</body>
<?php include 'footer.php'; ?>

</html>