<?php
require_once "../connenct/database.php";
$obj = new Database();
session_start();
if (!isset($_SESSION['donor'])) {
    header("Location: ./index.php");
    exit();
}
$donor_id = $_SESSION['donor_id'];
$where = "d_id= $donor_id";
$obj->select('donor', '*', null, $where);
$values = $obj->getResult();
if (!empty($values) && is_array($values)) {
    $donor = $values[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AASTHA Blood Bank</title>
    <style>
        .bg {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
        }

        .card {
            height: 700px;
            width: 425px;
            border-radius: 10px;
            background-image: url('images/card/ecardbgfinal.png');
            background-size: cover;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            color: white;
        }

        .companyname {
            font-size: 40px;
            margin: 20px 0px 0px 30px;
        }

        .top img {
            height: 160px;
            width: 160px;
            background-color: #e6ebe0;
            border-radius: 50%;
            position: absolute;
            top: 102px;
            left: 235px;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, .5);
        }

        .detail {
            position: absolute;
            top: 161px;
            left: 120px;
            font-size: 36px;
        }

        .more {
            position: absolute;
            top: 350px;
            left: 30px;
            font-size: 16px;
            color: black;
        }

        .more .adr {
            width: 35%;
            text-align: justify;
        }

        .barcode img {
            position: absolute;
            top: 540px;
            left: 60%;
            height: 120px;
            width: 120px;
            padding: 10px;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .card,
            .card * {
                visibility: visible;
            }

            .card {
                position: absolute;
                left: 0;
                top: 0;
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="card">
            <div class="companyname">AASTHA<br>Blood Bank</div>
            <div class="top">
                <img src="<?php echo $donor['d_img']; ?>" alt="<?php echo $donor['d_name']; ?>">
            </div>
            <div class="detail">
                <p style="color:red;"><?php echo $donor['d_blood']; ?></p>
                <p><b><?php echo $donor['d_name']; ?></b></p>
            </div>
            <div class="more">
                <p><b>Mobile No:</b> <?php echo $donor['d_phone']; ?></p>
                <p><b>Email:</b> <?php echo $donor['d_mail']; ?></p>
                <p><b>DOB:</b> <?php echo $donor['d_dob']; ?></p>
                <p><b>Gender:</b> <?php echo $donor['d_gender']; ?></p>
                <p class="adr"><b>Address:</b> <?php echo $donor['d_adr']; ?></p>
                <p><b>Last Donation:</b> <?php echo $donor['last_donate_b']; ?></p>
            </div>
            <div class="barcode">
                <img src="images/card/qrcode.png" alt="QR Code">
            </div>
        </div>
    </div>

    <button onclick="window.print()">Print</button>
</body>

</html>