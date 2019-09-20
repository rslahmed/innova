<?php

require 'ses-check.php';
require 'db.php';
$select_data = "SELECT * FROM banners";
$select_con = mysqli_query($db, $select_data);

?>
<?php require 'des_assets/admin-header.php'; ?>
    <link rel="stylesheet" href="custom.css">

    <style>.modal.fade.show {
            padding-right: 0 !important;
        }</style>

    <!--content-->
    <main class="app-content">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header"><h1 class="text-center">View banners</h1></div>
                            <?php if (isset($_SESSION['user_msg'])) { ?>

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


                            <?php if (isset($_SESSION['active_msg'])) { ?>
                                <div id="success-alert"
                                     class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                    <?php
                                    echo $_SESSION['active_msg'];
                                    unset($_SESSION['active_msg']);
                                    ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <script>
                                        window.setTimeout(function () {
                                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                                $(this).remove();
                                            });
                                        }, 2000);
                                    </script>
                                </div>
                            <?php } ?>

                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>BANNER TITLE</th>
                                    <th>BANNER TEXT</th>
                                    <th>BANNER BUTTON</th>
                                    <th>STATUS</th>
                                    <th>BANNER IMAGE</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($select_con as $value) { ?>
                                    <tr>
                                        <td><?php echo $value['id']; ?></td>
                                        <td><?php echo substr($value['banner_title'], 0, 20) . "...."; ?></td>
                                        <td><?php echo substr($value['banner_text'], 0, 25) . "...."; ?></td>
                                        <td><?php echo $value['banner_btn']; ?></td>
                                        <td>
                                            <?php
                                            if ($value['status'] == '1') { ?>
                                                <button type="button" class="btn btn-success">
                                                    Active
                                                </button>

                                            <?php } else { ?>
                                                <button type="button" class="btn btn-warning text-white"
                                                        data-toggle="modal"
                                                        data-target="#status<?php echo $value['id']; ?>">
                                                    Deactive
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="status<?php echo $value['id']; ?>"
                                                     tabindex="-1"
                                                     role="dialog" aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-info">Do you want to active
                                                                    it</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No
                                                                </button>
                                                                <a href="banner_status.php?id=<?php echo $value['id']; ?>"
                                                                   class="btn btn-info">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- modal end -->
                                            <?php } ?>
                                        </td>
                                        <td><img src="uploads/banner/<?php echo $value['banner_img']; ?>" alt="Profile"
                                                 style="width: 50px;"></td>
                                        <td>
                                            <a href="edit-banner.php?id=<?php echo $value['id'] ?>"
                                               class="btn btn-secondary">Edit</a>
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
                                                            <a href="delete_banner.php?id=<?php echo $value['id']; ?>"
                                                               class="btn btn-danger">Yes</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- modal end -->
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