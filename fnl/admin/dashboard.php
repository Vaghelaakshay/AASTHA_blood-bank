<?= $heading = "DASHBOARD"; ?>
<?php require_once "header.php" ?>
    <div class="cards">
            <div class="card card-donors">
                <div class="card-content">
                    <div class="card-number">
                        <?php
                        $sql = "SELECT  COUNT(*) FROM `donor`;";
                        $obj->sql($sql);
                        $res = $obj->getResult();
                        $stock = $res[0]["COUNT(*)"];
                        echo $stock;
                        ?>
                    </div>
                    <div class="card-title">Total Donors</div>
                </div>
                <div class="card-footer">
                    <a href="./admin.donor.php">More info</a>
                </div>
            </div>
            <div class="card card-blood-group">
                <div class="card-content">
                    <div class="card-number">
                        <?php
                        $sql = "SELECT SUM(quntity) FROM `blood_group`;";
                        $obj->sql($sql);
                        $res = $obj->getResult();
                        $stock = $res[0]["SUM(quntity)"];
                        echo $stock;
                        ?>
                    </div>
                    <div class="card-title">Total Blood Stock</div>
                </div>
                <div class="card-footer">
                    <a href="stock.php">More info</a>
                </div>
            </div>
            <div class="card card-city">
                <div class="card-content">
                    <div class="card-number">
                        <?php
                        $sql = "SELECT  COUNT(*) FROM `camp`;";
                        $obj->sql($sql);
                        $res = $obj->getResult();
                        $stock = $res[0]["COUNT(*)"];
                        echo $stock;
                        ?>
                    </div>
                    <div class="card-title">Total Camp</div>
                </div>
                <div class="card-footer">
                    <a href="./admin.camp.php">More info</a>
                </div>
            </div>
            <div class="card card-users">
                <div class="card-content">
                    <div class="card-number">
                        <?php
                        $sql = "SELECT  COUNT(*) FROM `staff`;";
                        $obj->sql($sql);
                        $res = $obj->getResult();
                        $stock = $res[0]["COUNT(*)"];
                        echo $stock;
                        ?>
                    </div>
                    <div class="card-title">Total Staff</div>
                </div>
                <div class="card-footer">
                    <a href="staff.php">More info</a>
                </div>
            </div>
        </div>
<?php require './footer.php'; ?>