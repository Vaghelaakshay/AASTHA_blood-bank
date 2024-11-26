    <style>
        .backg {
            width: max-content;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .search-bar {
            margin-bottom: 20px;
            text-align: center;
        }

        .search-bar select {
            padding: 10px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;

            &:hover {
                background-color: #45a049;
            }
        }

        .row {
            display: flex;
        }

        .column {
            flex: 50%;
            padding: 5px;
        }

        .card {
            width: 300px;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            overflow: hidden;
        }

        .card-content {
            position: relative;
        }

        .contact-details {
            display: none;
            margin-top: 20px;
        }

        .card.expanded {
            width: 350px;
            height: 200px;
        }

        .card.expanded .contact-details {
            display: block;
        }

        .table-container {
            overflow-x: auto;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
            text-align: left;
            color: #555;
        }

        .custom-table thead th {
            background-color: #f9f9f9;
            color: #333;
            padding: 12px 16px;
            font-weight: bold;
            text-transform: uppercase;
            border-bottom: 1px solid #ccc;
        }

        .custom-table tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid #ccc;
        }

        .custom-table tbody tr:nth-child(odd) {
            background-color: #f4f4f4;
        }

        .custom-table tbody tr:hover {
            background-color: #eaeaea;
        }

        .custom-table tbody td:first-child {
            font-weight: 600;
            color: #222;
        }

        .btn {
            border: none;
            color: white;
            padding: 14px 28px;
            cursor: pointer;
        }

        .blue {
            background-color: #2196F3;

            &:hover {
                background: #0b7dda;
            }
        }
    </style>
    <?php require_once 'header.php'; ?>
    <main>
        <div class="bg">
            <div class="backg">
                <h1>Looking for Blood</h1>
                <form action="" method="post">
                    <div class="search-bar">
                        <select name="bloodGroup" id="bloodType" required>
                            <option value="" disabled selected>Select Blood Group</option>
                            <?php
                            $obj->select('blood_group', 'name');
                            $result = $obj->getResult();
                            foreach ($result as list("name" => $bGroup)) {
                                echo "<option value='$bGroup'>$bGroup</option>";
                            } ?>
                        </select>
                        <button type="submit" name="submit" onclick="searchBlood()">Search</button>
                    </div>
                </form>
                <?php if (isset($_POST['submit'])) :
                    $blood = $_POST['bloodGroup'];
                    $where = "name = '$blood'";
                    $obj->select('blood_group', '*', null, $where);
                    $result = $obj->getResult();
                    $detail = $result[0]; ?>
                    <div class="row">
                        <div class="column">
                            <div class="card" onclick="toggleDetails(this)">
                                <div class="card-content">
                                    <h2>Blood Inventory</h2>
                                    <p> <?= $detail['name']; ?>In Stock :<b> <?= $detail['quntity'] ?></b></p>
                                    <p>click for contact </p>
                                    <div class="contact-details" style="display: none;">
                                        <?php
                                        $where = "s_roll = 'operator'";
                                        $obj->select('staff', '*', null, $where);
                                        $result = $obj->getResult();
                                        foreach ($result as $staff) {
                                            $name = $staff['s_name'];
                                            $phone = $staff['s_contact'];

                                            echo "name :$name ,Phone:$phone<br>";
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="title">
                                <h2>Donor List</h2>
                                <button class="btn blue"><a href="./print.donorlist.php?print=<?php echo urlencode($blood); ?>" style="text-decoration: none;color:white;">Download List</a></button>
                            </div>
                            <div class="table-container">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $where = "d_blood = '$blood'";
                                        $obj->select('donor', '*', null, $where);
                                        $result = $obj->getResult();
                                        foreach ($result as $donor) : ?>
                                            <tr>
                                                <td><?php echo $donor['d_name']; ?></td>
                                                <td><?php echo $donor['d_adr']; ?></td>
                                                <td><?php echo $donor['d_phone']; ?></td>
                                                <td><a href="lookingBlood.view.php?view_id=<?php echo $donor['d_id']; ?>">View More</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        <?php endif; ?>

        <script>
            function toggleDetails(card) {
                const details = card.querySelector('.contact-details');
                if (details.style.display === 'none' || details.style.display === '') {
                    details.style.display = 'block';
                } else {
                    details.style.display = 'none';
                }
            }
        </script>

        </div>
        </div>
    </main>
    <?php require_once "footer.php"; ?>