<?php
require 'ses-check.php';
require 'db.php';
$id = $_GET['id'];
$select_data = "SELECT * FROM messages WHERE id='$id'";
$select_con = mysqli_query($db, $select_data);
$single_data = mysqli_fetch_assoc($select_con);


$update = "UPDATE messages SET status=1 WHERE id='$id'";
$update_con = mysqli_query($db, $update);
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
                                <td><?php echo $single_data['msg_name']; ?></td>
                            </tr>

                            <tr>
                                <th>EMAIL</th>
                                <td><?php echo $single_data['msg_email']; ?></td>
                            </tr>
                            <tr>
                                <th>MESSAGE</th>
                                <td><?php echo $single_data['message']; ?></td>
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


