<?= $heading = "NEW FAQs"; ?>
<?php require_once "header.php" ?>
<div class="form-container">
    <form action="" method="post">
        <div class="form-group">
            <label>Question</label>
            <input type="text" name="que" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Answers</label>
            <input type="text" name="ans" class="form-control" required>
        </div>
        <div>
            <input type="submit" name="submit" class="btn green">
        </div>
    </form>
</div>
<?php require './footer.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $ques = $_POST['que'];
    $answ = $_POST['ans'];
    $obj->insert('faqs', ['f_que' => $ques, 'f_ans' => $answ]);
    $values = $obj->getResult();
    if (!empty($values) && is_array($values)) {
        // var_dump($values); 
        if ($values == true) {
            // echo "data has been updated";
            echo  "<script>window.open('admin.faq.php','_self');</script>";
        } else {
            echo "failed , try again";
        }
    }
}
?>