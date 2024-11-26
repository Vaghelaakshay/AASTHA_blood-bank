<?= $heading = " CAMP"; ?>
<?php require_once "header.php" ?>
<?php require_once "../function.php" ?>

<?php

if (isset($_GET['update'])) {
    $where ="c_id=". $_GET['update'];
    $obj->select('camp', '*', null, $where);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        $first_result = $values[0]; 
    } else {
        echo "No results found.";
    }
}?>
<div class="form-container">
    <center><h1>Camp Update</h1></center>
    <form action="" method="post">
 
        <div class="form-group">
            <lable>Camp Title</lable>
            <input type="text" name="title" class="form-control" value="<?php echo $first_result['c_campNm']; ?>" readonly>
        </div>
        <div class="form-group">
            <lable>Enter Host Name</lable>
            <input type="text" name="host" class="form-control" value="<?php echo   $first_result['c_hostNm']; ?>" required>
        </div>
        <div class="form-group">
            <lable>Enter Phone</lable>
            <input type="number" name="phone" class="form-control" value="<?php echo $first_result['c_phone']; ?>" required>
        </div>
        <div class="form-group">
            <lable>Enter Address</lable>
            <textarea name="addr" id="" cols="50" rows="3" class="form-control" values="<?php echo $first_result['c_adr']; ?>" required><?php echo $first_result['c_adr']; ?></textarea>

        </div>
        <div>
            <input type="submit" value="edit" name="submit" class="btn green">
        </div>
        <?php
            
        ?>
    </form>
</div>
<?php require './footer.php'; ?>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['host'];
    $phones = $_POST['phone'];
    $addr = $_POST['addr'];
    $where = 'c_id=' . $edit_id;
    $obj->update('camp', ['c_hostNm' => $name, 'c_phone' => $phones, 'c_adr' => $addr], $where);
    $values = $obj->getResult();

    //    echo"<pre>";print_r($values);echo"</pre>";
    if (!empty($values) && is_array($values)) {
        $first_result = $values[0];
        // var_dump($first_result); 
        if ($first_result == true) {
            // echo "data has been updated";
            echo  "<script>window.open('admin.camp.php','_self');</script>";
        } else {
            echo "failed , try again";
        }
    }
}
?>