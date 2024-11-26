
<?php require_once "header.php"; ?>
<?php 
$where="s_roll='administrator'";
  $obj->select('staff','s_contact',null,$where);
  $res = $obj->getResult();
    $contact =$res[0]['s_contact'];
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: lightcoral;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
 }
</style>
<main>

    <div class="bg">
        <div class="ground">
           
            <div class="ticker">
                <div class="title">
                    <h5>NOTE:</h5>
                </div>
                <div class="news">
                    <marquee>
                        <p> host Blood Donation Camp :<?php echo $contact ?> </p>
                    </marquee>
                </div>
            </div>
            <h2>Camp Schedules </h2>
            <div class="table-info">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Camp Name</th>
                            <th>Host Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $obj->select('camp');
                        $result = $obj->getResult();
                        //    echo"<pre>"; var_dump($result); echo"</pre>";
                        if (!empty($result)): $i = 0;
                            foreach ($result as $donor) :  ++$i; ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $donor['c_campNm'] ?></td>
                                    <td><?php echo $donor['c_hostNm'] ?></td>
                                    <td><?php echo $donor['c_phone'] ?></td>
                                    <td><?php echo $donor['c_adr'] ?></td>
                                    <td><?php echo $donor['c_date'] ?></td>
                                </tr>
                        <?php endforeach;
                        endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once "footer.php"; ?>