 <?php require './connenct/database.php';
  $obj = new database();
  $obj->select('setting');
  $values = $obj->getResult();
  $result = $values['0'];
  $logo = './uploads/setting/' . str_replace('..', '.', $result['set_logo']);
  $title = $result['set_title'];
  ?>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $title ?></title>
   <link rel="shortcut icon" href="<?php echo $logo; ?>" type="image/x-icon">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="style1.css">
 </head>
 <header id="header">
   <div class="left-side">
     <a href="index.php">
       <img src="<?php echo $logo?>" alt="logo">  
     </a>
     <div class="text-content">
       <h1>AASTHA</h1>
       <p>Blood Bank</p>
     </div>
   </div>

   <nav>
     <ul class="navbar">
       <li class="nav-item" id="about-item">
         <span class="nav-link">About</span>
         <ul class="dropdown" id="about-dropdown">
           <li><a href="aboutUs.php">About Us</a></li>
           <li><a href="faq.php">FAQs</a></li>
           <li><a href="gallery.php">Gallery</a></li>
           <li><a href="feedback.php">Feedback</a></li>
           <li><a href="contactUs.php">Contact Us</a></li>
         </ul>
       </li>
       <li class="nav-item"><a href="lookingBlood.php" class="nav-link">Looking for Blood</a></li>
       <li class="nav-item"><a href="./donor" class="nav-link">Want to Donate Blood</a></li>
       <li class="nav-item"><a href="./camp.home.php" class="nav-link">Camp</a></li>
       <li class="nav-item"><a href="./admin" class="nav-link">Admin Login</a></li>
     </ul>
   </nav>
 </header>
 <script>
   const aboutItem = document.getElementById('about-item');
   const header = document.getElementById('header');
   const dropdown = document.getElementById('about-dropdown');

   aboutItem.addEventListener('mouseenter', () => {
     header.classList.add('expanded');
     dropdown.classList.add('show-dropdown');
   });

   aboutItem.addEventListener('mouseleave', () => {
     header.classList.remove('expanded');
     dropdown.classList.remove('show-dropdown');
   });
 </script>