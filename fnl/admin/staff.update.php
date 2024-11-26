<?= $heading = "Update Staff"; ?>
<?php require_once "header.php" ?>
<?php if (isset($_GET['update'])) {
    $where = "s_id=" . $_GET['update'];
    $obj->select('staff', '*', null, $where);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        $row = $values['0'];
    } else {
        echo "No results found.";
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['staffNm'];
    $con = $_POST['staffCon'];
    $where = "s_id='$id'";
    $obj->update('staff', ['s_name' => $name, 's_contact' => $con], $where);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        $first_result = $values[0];
        if ($first_result == true) {
            echo  "<script>window.open('staff.php','_self');</script>";
        } else {
            echo "failed , try again";
        }
    }
}
?>
<div class="form-container">
    <center>
        <h1>Update Staff detail </h1>
    </center>
    <form action="" method="post">
        <div class="form-group">
            <label>Enter Name:</label>
            <input type="hidden" name="id" value="<?php echo $row['s_id'] ?>">
            <input type="text" name="staffNm" class="form-control" value="<?php echo $row['s_name'] ?>" required>
        </div>
        <div class="form-group">
            <label>Enter Contact No:</label>
            <input type="text" name="staffCon" class="form-control" value="<?php echo $row['s_contact'] ?>" required>
        </div>
        <div class="form-group">
            <label>Enter Shift Time</label>
            <input type="text" class="form-control" value="<?php echo $row['s_shift'] ?>" readonly>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn green">
        </div>
    </form>
</div>
<?php require './footer.php'; ?>