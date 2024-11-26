<?php require_once "header.php";
?>
<style>
    .card {
        max-width: 342px;
        margin: 50px auto;
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .title {
        color: grey;
        font-size: 18px;
    }
    button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }
    a {
        text-decoration: none;
        font-size: 22px;
        color: white;
    }
    button:hover, a:hover {  opacity: 0.7;}
</style>
</head>

<body>
    <?php
    $id = $_GET['view_id'];
    $where = "d_id=' $id'";
    $obj->select('donor', '*', null, $where);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values) && isset($values[0]['d_name'])) :
        $donor = $values[0];?>
        <div class="bg">
            <div class="card">
                <img src="./donor/<?php echo $donor['d_img']; ?>" alt="<?php echo $donor['d_name']; ?>" style="height: 220px;">
                <h1><?php echo $donor['d_name']; ?></h1>
                <p class="title"><?php echo $donor['d_blood']; ?></p>
                <p><?php echo $donor['d_adr']; ?></p>
                <p><?php echo $donor['d_mail']; ?></p>
                <p><?php echo $donor['d_phone']; ?></p>
                <p><?php echo $donor['d_gender']; ?></p>
                <p><?php echo $donor['d_dob']; ?></p>
                <p><?php if (empty($donor['last_donate_b'])) {
                        echo "not donate yet";
                    } else {
                        $donor['last_donate_b'];
                    } ?>
                </p>
                <p><button><a href="lookingBlood.php">back</a></button></p>
            </div></div>
    <?php endif; ?>
    <?php require_once "footer.php" ?>