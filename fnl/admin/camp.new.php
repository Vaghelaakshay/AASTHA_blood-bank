<?= $heading = "ADD CAMP"; ?>
<?php require_once "header.php" ?>

    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Camp Title</label>
                <input class="form-control" type="text" name="title" required>

            </div>
            <div class="form-group">
                <label for="">Host Title</label>
                <input  class="form-control" type="text" name="host" required>
            </div>
            <div class="form-group">
                <label for="">Contact no</label>
                <input  class="form-control" type="number" name="phone" required>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea  class="form-control" name="addr" id="adr" cols="60" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="">Date</label>
                <input  class="form-control" type="date" name="date" id="" required>
            </div>

            <div class="form-group">
                <input  type="submit" name="submit" class="btn green">
            </div>
        </form>
    </div>
<?php require './footer.php'; ?>
<?php

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $host = $_POST['host'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    $date = $_POST['date'];

    $obj->insert('camp', ['c_hostNm' => $host, 'c_campNm' => $title, 'c_phone' => $phone, 'c_adr' => $addr, 'c_date' => $date]);
    $values = $obj->getResult();
}
?>
<?php require "./footer.php" ?>