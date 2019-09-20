<?php

require 'ses-check.php';
require 'db.php';
$select_data = "SELECT * FROM messages ORDER BY id DESC";
$select_con = mysqli_query($db, $select_data);

function timeAgo(){
    date_default_timezone_set('Asia/Dhaka');
    $tm = date('h:i:sa');
    $dt = date('y-m-d');

    global $value;
    $db_time = $value['times'];
    $new_time = $tm." ".$dt;

    $date1 = strtotime("$db_time");
    $date2 = strtotime($new_time);

// Formulate the Difference between two dates
    $diff = abs($date2 - $date1);


    $years = floor($diff / (365*60*60*24));

    $months = floor(($diff - $years * 365*60*60*24)
        / (30*60*60*24));

    $days = floor(($diff - $years * 365*60*60*24 -
            $months*30*60*60*24)/ (60*60*24));

    $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
        / (60*60));


    $minutes = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
            - $hours*60*60)/ 60);


    $seconds = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24
        - $hours*60*60 - $minutes*60));


    if ($years > 0 ){
        echo $years." year ago";
    }elseif($months > 0 ){
        echo $months." month ago";
    }elseif($days > 0 ){
        echo $days." day ago";
    }elseif($hours > 0 ){
        echo $hours." hour ago";
    }elseif($minutes > 0 ){
        echo $minutes." minute ago";
    }elseif($seconds > 0 ){
        echo "just now";
    }
}

?>
<?php require 'des_assets/admin-header.php'; ?>
    <link rel="stylesheet" href="custom.css">


    <!--content-->
    <main class="app-content">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header"><h1 class="text-center">All Users</h1></div>
                            <?php if (isset($_SESSION['user_msg'])){ ?>

                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    <?php
                                    echo $_SESSION['user_msg'];
                                    unset($_SESSION['user_msg']);
                                    ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php } ?>
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>MESSAGE</th>
                                    <th>TIMES</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($select_con as $value) { ?>
                                    <tr class="<?php if ($value['status']==1){ echo "bg-dark";}  ?>">
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo $value['msg_name']; ?></td>
                                        <td><?php echo $value['msg_email']; ?></td>
                                        <td><?php echo substr($value['message'], 0, 30)."..."; ?></td>
                                        <td><?php timeAgo(); ?></td>
                                        <td>
                                            <a href="view-msg.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">View</a>
                                            <?php if (isset($_SESSION['user_role']) && ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2)){ ?>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?php echo $value['id']; ?>">
                                                    Delete
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="delete<?php echo $value['id']; ?>" tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-danger">Are you sure?</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No
                                                                </button>
                                                                <a href="delete-message.php?id=<?php echo $value['id']; ?>"
                                                                   class="btn btn-danger">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- modal end -->

                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
require 'des_assets/admin-footer.php';
?>