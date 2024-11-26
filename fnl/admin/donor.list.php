<?php if (isset($_GET['bg'])) {
    $id = $_GET['bg']; ?>
    <?= $heading = "donor list " . htmlspecialchars($id); ?>
    <?php require_once "header.php" ?>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Last Donation Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $field = "`d_name`,`d_phone`, `d_gender`, `d_dob`, `d_mail`, `d_adr`, `last_donate_b` ";
            $where = "d_blood='$id'";
            $obj->select('donor', $field, null, $where);
            $result = $obj->getResult();
            if (!empty($result)) {
                $i = 0;
                // var_dump($result);
                foreach ($result as $values) {
                    ++$i;
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $values['d_name'] . '</td>
                        <td>' . $values['d_phone'] . '</td>
                        <td>' . $values['d_mail'] . '</td>
                        <td>' . $values['d_dob'] . '</td>
                        <td>' . $values['d_gender'] . '</td>
                        <td>' . $values['d_adr'] . '</td>
                        <td>' . $values['last_donate_b'] . '</td>
                        </tr>';
                }
            }
        } ?>
            </tbody>
        </table>
    </div>
    <?php require './footer.php'; ?>