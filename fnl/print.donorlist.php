<?php require './connenct/database.php';
$obj = new database(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Print Donor List</title>
    <style>
        #table_style {
            font-family: Arial, sans-serif;
            font-size: 10pt;
            border-collapse: collapse;
        }
        #table_style th {
            background-color: #F7F7F7;
            color: #333;
            font-weight: bold;
            padding: 5px;
            border: 1px solid #ccc;
        }
        #table_style td {
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div id="dvContents">
        <table id="table_style" cellspacing="0" rules="all" border="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>phone</th>
                    <th>Email</th>
                    <th>Blood Group</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>last Donate</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['print'])) :
                    $id=$_GET['print'];
                    $where="d_blood='$id'";
                    $obj->select('donor', '*', null,$where);
                    $result = $obj->getResult();
                    //  var_dump($result);
                    if (!empty($result)) : $i = 0;
                        foreach ($result as $values) :
                            ++$i;
                            $id = $values['d_id']; ?>
                            <tr>
                                <td><?php echo  $i; ?></td>
                                <td><?php echo  $values['d_name'];   ?></td>
                                <td><?php echo  $values['d_phone']; ?></td>
                                <td><?php echo  $values['d_mail']; ?></td>
                                <td><?php echo  $values['d_blood']; ?></td>
                                <td><?php echo  $values['d_dob']; ?></td>
                                <td><?php echo  $values['d_adr']; ?></td>
                                <td><?php echo  $values['d_gender']; ?></td>
                                <td><?php echo  $values['last_donate_b']; ?></td>
                            </tr>
                <?php endforeach; endif; endif; ?>
            </tbody>
        </table>
    </div> <br />
    <button onclick="PrintTable()">Print</button>
    <script>
        function PrintTable() {
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Table Contents</title>');
            var table_style = document.getElementById("table_style").innerHTML;
            printWindow.document.write('<style type = "text/css">');
            printWindow.document.write(table_style);
            printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
            var contents = document.getElementById("dvContents").innerHTML;
            printWindow.document.write(contents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>
</html>