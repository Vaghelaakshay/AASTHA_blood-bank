<?= $heading = "FAQs"; ?>
<?php require_once "header.php" ?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
                <th>date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $obj->select('faqs');
            $result = $obj->getResult();
            //  var_dump($result);
            if (!empty($result)) : $i = 0;
                foreach ($result as $values) :
                    ++$i;

                    $faq_id = $values['f_id'];
                    $faq_que = $values['f_que'];
                    $faq_ans = $values['f_ans'];
                    $date = $values['last_update'];
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $faq_que; ?></td>
                        <td><?php echo $faq_ans; ?></td>
                        <td><?php echo $date ?></td>

                        <td>
                            <a href="faq.update.php?update=<?php echo $faq_id ?>" class="btn blue">update</a>
                        </td>
                        <td>    
                            <form action="" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo  $faq_id ?>">
                                <button type="submit" name="submit" class="btn red">delete</button>
                            </form>
                        </td>
                <?php endforeach;
            endif; ?>
        </tbody>
    </table>
</div>
<?php require './footer.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $id = $_POST['delete_id'];
    $where = 'f_id=' . $id;
    $obj->delete('faqs', $where);
    if ($obj->getResult()) {
    }
}
?>