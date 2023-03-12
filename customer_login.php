<html>

<head>
    <title>Login Page</title>

    <link rel="stylesheet" type="text/css" href="./css/customer_login.css"/>

</head>

<body>

    <?php include 'header.php' ?>
    <div class="login_container">

        <form  action="customer_login_process.php" method="post">
            <br>
            <div class="formspace">
                <p class="formspace2">

                <div class="form">

                    <label class="login">LOGIN</label>
                    <div class="input_field">

                        <label class="userdetail">Name</label><br>
                        <input class="name" type="text" name="name" required /><br>
                        <label class="userdetail">Phone Number</label><br>
                        <input class="phone_number" type="text" name="phone" required /><br>
                        <label class="userdetail">Password</label><br>
                        <input class="password" type="password" name="password" required /><br>
                        <input class="login-btn" type="submit" name="login-btn" value="LOGIN" /><br>
                        <a href="cust_forgetpass.php" class="help"><label class="label_help">FORGET PASSWORD
                                ?</label></a>
                        <img class="userloginimg"
                            src="https://media.istockphoto.com/id/866779562/vector/flat-design-banking-and-finance-bank-icon-with-side-shadow.jpg?s=170667a&w=0&k=20&c=b3zjsDC3nxJ1VKP5VM-ksLDEdD0YI7WsWvkIo0Ausu8="
                            height="90px" width="90px">
                    </div>
                </div>
            </div>
    </div>
    </form>
    <br>

    <?php include 'footer.php' ?>
</body>

</html>
<?php
    // if(isset($_POST['login_btn'])){
    //     $email=$_POST['email'];
    //     $password=$_POST['password'];
        
    // }

    
?>