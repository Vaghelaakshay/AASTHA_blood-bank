<?= $heading = "CAMP"; ?>
<?php require_once "header.php" ?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Camp Host Name</th>
                <th>Camp Title</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $obj->select('camp');
            $result = $obj->getResult();
            //  var_dump($result);
            if (!empty($result)) : $i = 0;
                foreach ($result as $values) :
                    ++$i;
                    $id = $values['c_id'];
                    $host = $values['c_hostNm'];
                    $title = $values['c_campNm'];
                    $phone = $values['c_phone'];
                    $adr = $values['c_adr'];
                    $date = $values['c_date']; ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo  $host; ?></td>
                        <td><?php echo  $title; ?></td>
                        <td><?php echo  $phone; ?></td>
                        <td><?php echo  $adr; ?></td>
                        <td><?php echo  $date; ?></td>

                        <td>
                            <a href="camp.update.php?update=<?php echo $id; ?>" class="btn blue">update</a>
                        </td>
                        <td>    
                            <form action="" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo  $id ?>">
                                <button type="submit" name="submit" class="btn red">delete</button>
                            </form>
                        </td>
                    </tr>
            <?php endforeach;
            endif; ?>
        </tbody>
    </table>
</div>
<?php require './footer.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['delete_id'];
    $where = 'c_id=' . $id;
    $obj->delete('camp', $where);
    if ($obj->getResult()) {
        echo "<script>location.replace(location.href);</script>";
    }
}
?>