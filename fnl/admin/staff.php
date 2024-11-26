<?= $heading = "STAFF"; ?>
<?php require_once "header.php" ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Roll</th>
                <th>Shift</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $obj->select('staff');
            $result = $obj->getResult();
            //  var_dump($result);
            foreach ($result as $values) :
                $sid = $values['s_id'];
                $name = $values['s_name'];
                $phone = $values['s_contact'];
                $roll = $values['s_roll'];
                $shift = $values['s_shift']; ?>
                <tr style="margin-bottom: 10px;">
                    <td><?php echo $sid; ?></td>
                    <td><?php echo  $name; ?></td>
                    <td><?php echo  $phone; ?></td>
                    <td><?php echo $roll; ?></td>
                    <td><?php echo $shift; ?></td>
                    <td>
                        <?php if ($roll == "administrator") {
                            echo "not changeable";
                        } else { ?>
                            <a href="staff.update.php?update=<?php echo $sid; ?>" class="btn blue">update</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require './footer.php'; ?>