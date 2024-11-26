<?= $heading = "Update FAQs"; ?>
<?php require_once "header.php" ?>
<?php
if (isset($_GET['update'])) {
    $edit_id = $_GET['update'];
    $where = '`f_id`=' . $edit_id;
    $obj->select('faqs', '*', null, $where);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        $row = $values['0'];
    } else {
        echo "No results found.";
    }
}
?>
<div class="form-container">
    <center>
        <h1>FAQs Update</h1>
    </center>

    <form action="" method="post">
        <div class="form-group">
            <lable>Question</lable>
            <input type="text" name="que" class="form-control" value="<?php echo $row['f_que']; ?>" readonly>
        </div>
        <div class="form-group">
            <lable>Answers</lable>
            <input type="text" name="ans" class="form-control" value="<?php echo $row['f_ans']; ?>" required>
        </div>
        <div>
            <input type="submit" value="update" name="submit" class="btn green">
        </div>
    </form>
</div>

<?php require './footer.php'; ?>
<?php
if (isset($_POST['submit'])) {

    $que = $_POST['que'];
    $ans = $_POST['ans'];
    $date = date('Y-m-d');
    $where = 'f_id=' . $edit_id;
    $obj->update('faqs', ['f_que' => $que, 'f_ans' => $ans, 'last_update' => $date], $where);
    $values = $obj->getResult();

    echo "<pre>";
    print_r($values['0']);
    echo "</pre>";

    if ($values == true) {
        echo "data has been updated";
        echo  "<script>window.open('admin.faq.php','_self');</script>";
    } else {
        echo "failed , try again";
    }
}
?>