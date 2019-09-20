<?php
require 'ses-check.php';
require 'db.php';
$id = $_GET['id'];
$select_data = "SELECT * FROM users WHERE id='$id'";
$select_con = mysqli_query($db, $select_data);
$single_data = mysqli_fetch_assoc($select_con);

?>
<?php require 'des_assets/admin-header.php'; ?>


    <!--content-->
    <main class="app-content">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="card text-white bg-dark mb-3">
                            <div class="card-header"><h1 class="text-center">All Users</h1></div>
                            <table class="table table-dark">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td><?php echo $single_data['id']; ?></td>
                                </tr>

                                <tr>
                                    <th>NAME</th>
                                    <td><?php echo $single_data['name']; ?></td>
                                </tr>

                                <tr>
                                    <th>EMAIL</th>
                                    <td><?php echo $single_data['email']; ?></td>
                                </tr>

                                <tr>
                                    <th>ROLE</th>
                                    <td>
                                        <?php
                                        if ($single_data['role'] == 1) {
                                            echo "Admin";
                                        } elseif ($single_data['role'] == 2) {
                                            echo "Modaretor";
                                        } else {
                                            echo "Editor";
                                        }; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <a href="update-user.php?id=<?php echo $single_data['id'] ?>" class="btn btn-secondary">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#delete<?php echo $single_data['id']; ?>">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete<?php echo $single_data['id']; ?>" tabindex="-1"
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
                                                        <a href="delete-user.php?id=<?php echo $single_data['id']; ?>"
                                                           class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal end -->
                                    </td>
                                </tr>
                                <tr>
                                    <th>Photo</th>
                                    <td><img src="user-img/<?php echo $single_data['photo']; ?>" alt="Image" style="max-width: 300px;"></td>
                                </tr>
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


