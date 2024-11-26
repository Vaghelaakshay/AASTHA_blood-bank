<?= $heading = "Settings"; ?>
<?php require_once "header.php" ?>
<style>
    #image {
        margin-top: 10px;
        border-radius: 5px;
        max-width: 100%;
        height: auto;
    }
</style>

<div class="form-container">
    <form action="" method="post">
        <?php
        $obj->select('setting');
        $result = $obj->getResult();
        if (count($result) > 0) {
            foreach ($result as $row) {
        ?>
                <!-- <div class="containers"> -->
                <div class="form-group">
                    <label for="">Site Name</label>
                    <input type="hidden" name="setting_id" value="<?php echo $row['set_id']; ?>">
                    <input type="text" class="form-control site_name" name="site_name" value="<?php echo $row['set_title'] ?>">
                </div>
                <div class="form-group">
                    <label>Site Logo</label>
                    <input type="file" class="form-control new_logo image" name="new_logo" />
                    <input type="hidden" class="form-control old_logo image" name="old_logo" value="<?php echo $row['set_logo']; ?>">
                    <img id="image" src="../uploads/setting/<?php echo $row['set_logo']; ?>" alt="" width="100px" />
                </div>
                <div class="form-group">
                    <label for="">Address </label>
                    <textarea name="site_adr" id="" cols="90" rows="2"><?php echo $row['set_address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">phone </label>
                    <input type="text" class="form-control site_name" name="site_phone" value="<?php echo $row['set_phone'] ?>">

                </div>
                <div class="form-group">
                    <label for="">Email </label>
                    <input type="mail" class="form-control site_name" name="site_mail" value="<?php echo $row['set_mail'] ?>">
                </div>
                <!-- </div> -->
                <div class="form-group">
                    <button type="submit" class=" btn green" name="submit">update</button>
                </div>
        <?php
            }
        }
        ?>
    </form>
</div>
<?php require './footer.php'; ?>
<?php
if (isset($_POST['submit'])) {

    $id = $_POST['setting_id'];
    $set_name = $_POST['site_name'];
    if (!empty($_POST['new_logo'])) {
        $set_logo = $_POST['new_logo'];
    } else {
        $set_logo = $_POST['old_logo'];
    }
    $set_adr = $_POST['site_adr'];
    $set_phone = $_POST['site_phone'];
    $set_mail = $_POST['site_mail'];
    $set_tm = date("Y-m-d");
    $key = ['set_title' => $set_name, 'set_logo' => $set_logo, 'set_address' => $set_adr, 'set_phone' => $set_phone, 'set_mail' => $set_mail, 'update_date' => $set_tm];
    $where = "set_id='$id'";
    $obj->update('setting', $key, $where);

    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        $first_result = $values[0];
        //  var_dump($first_result); 
        if ($first_result == true) {
            echo "data has been updated";
            echo  "<script>window.open('setting.php','_self');</script>";
        } else {
            echo "failed , try again";
        }
    }
}
?>