<?php $heading = "DONOR";
$table = "donor"; $limit=4;?>
<?php require 'header.php';?>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>image</th>
                <th>name</th>
                <th>phone</th>
                <th>Email</th>
                <th>Blood Group</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Gender</th>
                <th>last Donate</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            $obj->select($table,'*',null,null,null,$limit);
            $result = $obj->getResult();
            //  var_dump($result);
            if (!empty($result)) : $i = 0;
                foreach ($result as $values) :
                    ++$i;
                    $id = $values['d_id']; ?>
                    <tr>
                        <td><?php echo  $i; ?></td>
                        <td><img src="../donor/<?php echo $values['d_img'] ?>" alt="" width="90px" height="90px"> </td>
                        <td><?php echo  $values['d_name'];   ?></td>
                        <td><?php echo  $values['d_phone']; ?></td>
                        <td><?php echo  $values['d_mail']; ?></td>
                        <td><?php echo  $values['d_blood']; ?></td>
                        <td><?php echo  $values['d_dob']; ?></td>
                        <td class="adr" ><?php echo  $values['d_adr']; ?></td>
                        <td><?php echo  $values['d_gender']; ?></td>
                        <td><?php echo  $values['last_donate_b']; ?></td>
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
    <?php
    $paginationData = $obj->pagination($table, null, null, $limit);

    if ($paginationData) {
        $current_page = $paginationData['current_page'];
        $total_pages = $paginationData['total_pages'];
        $total_record = $paginationData['total_record'];

        echo "<div class='pagination'>";
        echo "<span>Showing " . (($current_page - 1) * $limit + 1) . " to " . min($current_page * $limit, $total_record) . " of $total_record entries</span>";
        echo "<div>";

        if ($current_page > 1) {
            echo "<button onclick=\"window.location.href='?page=" . ($current_page - 1) . "'\">Previous</button>";
        } else {
            echo "<button disabled>Previous</button>";
        }
        echo "<span>$current_page</span>";

        if ($current_page < $total_pages) {
            echo "<button onclick=\"window.location.href='?page=" . ($current_page + 1) . "'\">Next</button>";
        } else {
            echo "<button disabled>Next</button>";
        }

        echo "</div>";
        echo "</div>";
    }
    ?>
</div>
<?php require './footer.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['delete_id'];
    $where = 'd_id=' . $id;
    $obj->delete($table, $where);
    if ($obj->getResult()) {
        echo "<script>location.replace(location.href);</script>";
    }
}
?>