<body style="background-image: url('images/background.jpg');">
<div class="container">

    <?php

    session_start();

    $title = 'Read';
    include "includes/header.php";
  if (empty($_SESSION)){
      $_SESSION['user_type'] = "user";
  }

    $q_read = "SELECT purchased_seats, date_departure dd,destination_point dp,  `flights_id`, (seats-purchased_seats) AS Available FROM `flight` f JOIN plane p ON p.planes_id=f.planes_id JOIN destination d ON d.destination_id = f.destination_id";
    $result = mysqli_query($conn, $q_read);


    if (mysqli_num_rows($result) > 0) {
    
     include "includes/nav/nav.html"; 

   ?>
        <div class="table100 ver3 m-b-110">
            <table data-vertable="ver3">

                <thead>

                <tr class="row100 head">
                    <th class="column100 column1 " data-column="column1"><a class="btn btn-danger" href="includes/modules/logout_module.php"><i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>Sign out</a></th>
                    <th class="column100 column2" data-column="column2">Destination</th>
                    <th class="column100 column3" data-column="column3">d&t of departure</th>
                    <th class="column100 column4" ></th>

                    <?php if (isset($_SESSION['user_type']) == 'admin') { ?>
                        <th class="column100 column5" data-column="column5">Purchased seats</th>
                        <th class="column100 column6" data-column="column6">Update</th>
                        <th class="column100 column7" data-column="column7">Delete</th>
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
                        <?= $row['Available'] ?>
                    </td>



                    <?php if (isset($_SESSION['user_type']) == 'admin') {

                        ?>
                        <td class="column100 column6">
                            <?= $row['purchased_seats'] ?>
                        </td>

                        <td class="column100 column7">
                            <a class="btn btn-primary"
                               href="update.php?flight=<?= $row['flights_id'] ?>">Update</a>
                        </td>
                        <td class="column100 column8">
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
        if (isset($_SESSION['user_type']) == 'admin') { ?>
            <a class="btn btn-warning" href="create.php">Add new flight</a>
            <?php
        }

    }
    ?>

    <?php
    include 'includes/footer.php';


    ?>


