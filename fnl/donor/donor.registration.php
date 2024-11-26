<?php require "../connenct/database.php";
$obj = new database();?>
<?php if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $bloodGroup = $_POST['bloodGroup'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bloodGroup = $_POST['bloodGroup'];
    $lastDonateDate = $_POST['lastDonateDate'];
    $where="d_phone='$phone' AND d_dob='$dob'";
    $obj->select('donor','*',null,$where);
    $values = $obj->getResult();
    if (empty($values)) {
        if ($_POST['password'] == $_POST['conpassword']) {
            $pass = $_POST['password'];
            $encrypt_pass =  md5($pass);
        } else {
            $error="password not match";
        }
            $values = ["d_name" => $name,"d_gender" => $gender,"d_blood" => $bloodGroup,"d_dob" => $dob,"d_phone" => $phone,"d_mail" => $email,"d_adr" => $address,"d_password" => $encrypt_pass,"last_donate_b" => $lastDonateDate ];
            if ($obj->insert('donor', $values)) {
            $success="Data inserted";
            header("location:./index.php");
            exit();
        } else {$error="Have Error something"; }
    }else{$error="already you have an account ";} 
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .containers {
            display: flex;
            flex-wrap: wrap;
        }
        .form-group {
            flex: 1;
            padding: 15px;
            box-sizing: border-box;
        }
        .form-container {
            height: 800px;
            width: 650px;
            margin: 5% 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Donor Registration</h2>
        <form action="" method="post">
            <div class="containers">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <label for="bloodGroup">Blood Group:</label>
                    <select name="bloodGroup" required>
                        <option value="" disabled selected>Select Blood Group</option>
                        <?php
                        $obj->select('blood_group', 'name');
                        $result = $obj->getResult();
                        foreach ($result as list("name" => $blood_group)) {
                            echo "<option value='$blood_group'>$blood_group</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lastDonateDate">Last Donate Date:</label>
                    <input type="date" id="lastDonateDate" name="lastDonateDate">
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>

                    <label for="password">Conform Password:</label>
                    <input type="password" id="conpassword" name="conpassword" required>
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <button type="submit" name="submit">Register</button>
                </div>
            </div>
            <div class="containers">
                <div class="form-group">
                    <p style="color:red"><?php  echo @$error ;?></p>
                    <p style="color:green"><?php echo @$success;?></p>
                </div></div>
        </form>
    </div>
</body>
</html>