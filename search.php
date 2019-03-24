<?php

session_start();
$title = "Search";
include "includes/header.php";

?>

    <div class="container" style="padding-top: 15px">
        <form class="form-inline mr-auto">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="Search" aria-label="Search">
            <button class="btn btn-warning btn-rounded btn-sm my-0" type="submit">Search</button>
        </form>
    </div>
<?php

if (!empty($_GET)) {

    $input = $_GET['Search'];

    $num_length = strlen($input);
    //var_dump($num_length);
    if ($num_length == 11) {
        $read_query= "  SELECT purchased_seats, date_departure dd,destination_point dp, `flights_id`, (seats-purchased_seats), available_seats a_s, flight_code 
                        AS Available 
                        FROM `flight` f 
                        JOIN plane p 
                        ON p.planes_id=f.planes_id 
                        JOIN destination d
                        ON d.destination_id = f.destination_id 
                        WHERE `flight_code`='$input'";

    }
    //var_dump($read_query);
    $result = mysqli_query($conn, $read_query);
   // var_dump($result);
    if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="container table100 ver3 m-b-110" style="padding-top: 15px">
            <table data-vertable="ver3">

                <thead>

                <tr class="row100 head">
                    <th class="column100 column1 " data-column="column1"><a class="btn btn-danger"
                                                                            href="includes/modules/logout_module.php"><i
                                    class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>Sign out</a></th>
                    <th class="column100 column2" data-column="column2">Destination</th>
                    <th class="column100 column3" data-column="column3">d&t of departure</th>
                    <th class="column100 column4" data-column="column4">Available seats</th>

                    <?php if (isset($_SESSION['user_type']) == 'admin') { ?>
                        <th class="column100 column4" data-column="column4">Purchased seats</th>
                        <th class="column100 column5" data-column="column5">Update</th>
                        <th class="column100 column6" data-column="column6">Delete</th>
                    <?php }

                    ?>
                </tr>

                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr class="row100">
                    <td class="column100 column1">
                        <?= $row['flights_id'] ?>
                    </td>
                    <td class="column100 column2">
                        <?= $row['dp'] ?>
                    </td>
                    <td class="column100 column3">
                        <?= $row['dd'] ?>
                    </td>
                    <td class="column100 column4">
                        <?= $row['a_s'] ?>
                    </td>


                    <?php if (isset($_SESSION['user_type']) == 'admin') {

                        ?>
                        <td class="column100 column4">
                            <?= $row['purchased_seats'] ?>
                        </td>
                        <td class="column100 column5">
                            <a class="btn btn-primary"
                               href="update.php?flight=<?= $row['flights_id'] ?>">Update</a>
                        </td>
                        <td class="column100 column5">
                            <a class="btn btn-primary"
                               href="delete.php?flight=<?= $row['flights_id'] ?>">Delete</a>
                        </td>


                    <?php }// end of session check
                    ?>

                    <?php
                    }//end of while
                    ?>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
    }


}






include "includes/footer.php";

?>