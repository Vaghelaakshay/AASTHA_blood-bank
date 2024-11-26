<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
} else {
    header("location:../admin/index.php");
}
require_once "../connenct/database.php";
$obj = new database();
$obj->select('setting');
$values = $obj->getResult();
$result = $values['0'];
$logo = str_replace('..', '.', $result['set_logo']);
$title = $result['set_title'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title ?></title>
    <header>
  <nav class="top-nav">
    <div class="logo"><?php echo  "welcome $_SESSION[user]"; ?></div>
    <a href="logout.php" class="btn black">Logout</a>
  </nav>
</header>
<div class="sidebar">
  <ul>
    <li><a href="dashboard.php">Dashboard</a></li>
    <li><a href="admin.donor.php">Donor</a></li>
    <li><a href="stock.php">Stock</a></li>
    <li><a href="admin.camp.php">Camp</a></li>
    <li><a href="staff.php">Staff</a></li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="admin.feedback.php">Feedback</a></li>
    <li><a href="admin.faq.php">FAQs</a></li>
    <li><a href="setting.php">Setting</a></li>
  </ul>
</div>
</head>

<body>
    <main>
        <div class="main-content">
            <div class="header">
                <h2><?php echo $heading; ?> </h2>
                <?php 
                
                switch ($heading) {
                    case 'CAMP':
                        echo'<a href="camp.new.php" class="btn blue">add camp</a>';
                        break;
                    case 'FAQs':
                        echo'<a href="faq.new.php" class="btn green">add faq</a>';
                        break;
                    case 'GALLERY':
                        echo'<a href="gallery.new.php" class="btn blue">new</a>';
                        break;
                        case strpos($heading, 'donor list ') === 0:
                        echo'<a href="stock.php" class="btn black">back</a>';
                        break;
                }
                ?>
            </div>