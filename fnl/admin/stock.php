<?= $heading = "STOCK"; ?>
<?php require_once "header.php" ?>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Blood Group</th>
                <th>Quantity</th>
                <th>Last date Update</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="post">
                <?php
                $obj->select('blood_group');
                $result = $obj->getResult();
                //  var_dump($result);
                if (!empty($result)) : $i = 0;
                    foreach ($result as $values) :
                        ++$i;
                        $sid = $values['id'];
                        $s_bg = $values['name']; ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><a style=" text-decoration: none; color:black;" href="./donor.list.php?bg=<?php echo urlencode($s_bg); ?>"><?php echo  $s_bg; ?></a></td>
                            <td>
                                <input type="text" style="width: 45px;" name="quantity[<?php echo  $sid; ?>]" value=" <?php echo  $values['quntity']; ?>">
                            </td>
                            <td><?php echo  $values['last_update']; ?></td>
                        
                        </tr>
                <?php endforeach;
                endif; ?>
                <tr>
                    <td><input type="submit" name="submit" class="btn green" value="update"></td>
                </tr>
            </form>
        </tbody>
    </table>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
            $stockData = $_POST['quantity'];
            foreach ($stockData as $id => $quantity) {
                $id = intval($id);
                $quantity = intval($quantity);

                $query = "UPDATE blood_group SET quntity = $quantity, last_update = NOW() WHERE id = $id";
                $obj->sql($query);

                $result = $obj->getResult();
                if (isset($result['error'])) {
                    echo "Error updating record with ID $id: " . $result['error'];
                }
            }

            if (!isset($result['error'])) {
                echo "<script>location.replace(location.href);</script>";
            }
        } else {
            echo "No stock data to update.";
        }
    }

    ?>

</div>
<?php require './footer.php'; ?>