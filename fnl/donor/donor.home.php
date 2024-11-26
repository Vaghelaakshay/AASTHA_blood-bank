<?php
require_once "../connenct/database.php";
$obj = new Database();
session_start();

if (!isset($_SESSION['donor'])) {
    header("Location:./index.php");
    exit();
}
if (isset($_GET['logout'])) {
    unset($_SESSION['donor']);
    header("location:../index.php");
    exit();
}
$donor_id = $_SESSION['donor_id'];
?>
<?php
$where = "d_id=' $donor_id'";
$obj->select('donor', '*', null, $where);
$values = $obj->getResult();
if (!empty($values) && is_array($values) && isset($values[0]['d_name'])) :
    $donor = $values[0];
?>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['up_name'] ?? '';
        $mail = $_POST['up_mail'] ?? '';
        $phone = $_POST['up_phone'] ?? '';
        $adr = $_POST['up_adr'] ?? '';
        $last = $_POST['up_lastdonate'] ?? '';
        $dob_year = date('Y', strtotime($donor['d_dob']));
        // Handle file upload
        $old_img = $_POST['old_img'];
        $new_img = $_FILES['new_img']['name'];
        $file_extension = pathinfo($new_img, PATHINFO_EXTENSION);
        $image = !empty($new_img) ? $name . '.' . $dob_year . '.' . $file_extension : $old_img;

        // Assuming you have a directory to store uploaded images
        $target_dir = "images/";
        $target_file = $target_dir . basename($image);

        // Update query
        $field = ['d_name' => $name, 'd_mail' => $mail, 'd_phone' => $phone, 'd_adr' => $adr, 'd_img' => $target_file, 'last_donate_b' => $last];
        // var_dump($field);
        $where = "d_id='$donor_id'";
        $obj->update('donor', $field, $where);
        if ($obj->getResult()) {
            if (!empty($new_img)) {
                move_uploaded_file($_FILES["new_img"]["tmp_name"], $target_file);
            }
            echo "data has been updated";
            echo  "<script>window.open('donor.home.php','_self');</script>";
        } else {
            echo "failed , try again";
        }
    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <style>
            .box {
                max-width: 600px;
                margin: 50px auto;
                background-color: white;
                padding: 30px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .profile-image {
                text-align: center;
                margin-bottom: 20px;
            }

            .profile-image img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                object-fit: cover;
            }

            .profile-info {
                margin-bottom: 20px;
            }

            .profile-info p {
                margin: 5px 0;
            }

            .buttons {
                text-align: center;
            }

            .btn {
                border: none;
                color: white;
                padding: 14px 28px;
                cursor: pointer;

            }

            .green {
                background-color: #04AA6D;

                &:hover {
                    background-color: #46a049;
                }
            }

            .blue {
                background-color: #2196F3;

                &:hover {
                    background: #0b7dda;
                }
            }

            .gray {
                background-color: #e7e7e7;
                color: black;

                &:hover {
                    background: #ddd;
                }
            }
            a {
                text-decoration: none;
                color: white;
            }
        </style>
    </head>

    <body>

        <div class="box">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="profile-image">
                    <input type="hidden" class="image" name="old_img" value="<?php echo htmlspecialchars($donor['d_img']); ?>">
                    <img id="image" src="<?php echo htmlspecialchars($donor['d_img']); ?>" alt="Profile Image" />
                    <input type="file" class="image" name="new_img" />
                </div>
                <div class="profile-info">
                    <p><strong>Name:</strong> <input type="text" name="up_name" value="<?php echo htmlspecialchars($donor['d_name']); ?>"></p>
                    <p><strong>Email:</strong> <input type="text" name="up_mail" value="<?php echo htmlspecialchars($donor['d_mail']); ?>"></p>
                    <p><strong>Phone:</strong> <input type="text" name="up_phone" value="<?php echo htmlspecialchars($donor['d_phone']); ?>"></p>
                    <p><strong>Address:</strong> <textarea name="up_adr" id="" cols="30" rows="2"><?php echo htmlspecialchars($donor['d_adr']); ?></textarea></p>
                    <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($donor['d_blood']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($donor['d_gender']); ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($donor['d_dob']); ?></p>
                    <p><strong>Last Donation Date:</strong> <input type="date" name="up_lastdonate" value="<?php echo htmlspecialchars($donor['last_donate_b']); ?>"></p>
                </div>
                <div class="buttons">
                    <a href="print.card.php" class="btn blue" >Print Card</a>
                    <button type="submit" name="submit"class="btn green" >Update</button>
                    <a href="?logout"  class="btn gray" >Logout</a>
                </div>
            </form>

        <?php endif; ?>
        </div>
    </body>

    </html>