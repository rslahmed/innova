<?php

require 'ses-check.php';
require 'db.php';
$select_data = "SELECT * FROM users";
$select_con = mysqli_query($db, $select_data);

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
                                <th>GENDER</th>
                                <th>ROLE</th>
                                <th>PHOTO</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($select_con as $value) { ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php echo $value['gender']; ?></td>
                                    <td>
                                        <?php
                                        if ($value['role'] == 1) {
                                            echo "Admin";
                                        } elseif ($value['role'] == 2) {
                                            echo "Editor";
                                        } else {
                                            echo "Modaretor";
                                        }; ?>
                                    </td>
                                    <td><img src="user-img/<?php echo $value['photo']; ?>" alt="Profile" style="width: 50px;"></td>
                                    <td>
                                        <a href="single-user.php?id=<?php echo $value['id'] ?>" class="btn btn-primary">View</a>
                                        <a href="update-user.php?id=<?php echo $value['id'] ?>" class="btn btn-secondary">Edit</a>
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
                                                        <a href="delete-user.php?id=<?php echo $value['id']; ?>"
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