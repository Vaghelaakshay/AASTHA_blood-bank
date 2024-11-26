<?= $heading = "GALLERY"; 
$table='gallery'; $limit=5;?>
<?php require_once "header.php" ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>File Name</th>
                <th>Image</th>
                <th>File Type</th>
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
                    $id = $values['g_id']; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $values['g_name'] ?></td>
                        <td>
                            <?php if ($values['g_type'] == "photo") { ?>
                                <img src="<?php echo $values['g_path'] ?>" alt="" width="80" height="80">
                            <?php } else { ?>
                                <video width="240" height="180" controls>
                                    <source src="<?php echo $values['g_path'] ?>" type="video/mp4">
                                </video>
                            <?php } ?>
                        </td>

                        <td><?php echo $values['g_type'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo  $id ?>">
                                <input type="hidden" name="path" value="<?php echo $values['g_path']; ?>">
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