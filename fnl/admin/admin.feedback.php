<?= $heading = "FEEDBACK"; ?>
<?php require_once "header.php" ?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>Email</th>
                <th>feedback</th>
                <th>Rating</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php
            $obj->select('feedback');
            $result = $obj->getResult();
            //  var_dump($result);
            if (!empty($result)) : $i = 0;
                foreach ($result as $values) :
                    ++$i;

                    $feedback_id = $values['f_id'];
                    $feedback_name = $values['f_name'];
                    $feedback_mail = $values['f_mail'];
                    $feedback_msg = $values['f_message'];
                    $feedback_rate = $values['f_rating'];
                    $feedback_dt = $values['f_date'];
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $feedback_name; ?></td>
                        <td><?php echo $feedback_mail; ?></td>
                        <td><?php echo $feedback_msg; ?></td>
                        <td><?php echo $feedback_rate; ?></td>
                        <td><?php echo $feedback_dt; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo  $feedback_id ?>">
                                <button type="submit" name="submit" class="btn red">delete</button>
                            </form>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </tbody>
    </table>
</div>
</div>
</main>
<?php require './footer.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['delete_id'];
    $where = 'f_id=' . $id;
    $obj->delete('feedback', $where);
    if ($obj->getResult()) {
    }
    // echo"<script>location.reload();</script>";
}
?>