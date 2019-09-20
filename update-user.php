<?php
require 'ses-check.php';
require 'db.php';
$id = $_GET['id'];
$select_data = "SELECT * FROM users WHERE id='$id'";
$select_con = mysqli_query($db, $select_data);
$single_data = mysqli_fetch_assoc($select_con);

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>

    <link rel="stylesheet" href="custom.css">

<main class="app-content no-padding">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Update User</h2>
                    <form method="POST" action="update-post.php" enctype="multipart/form-data">
                        <input hidden class="input--style-4" type="text" name="id" value="<?php echo $single_data['id'] ?>">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">name</label>
                                    <input class="input--style-4" type="text" name="fname"
                                           value="<?php echo $single_data['name'] ?>">
                                    <?php if (isset($_SESSION['name_err'])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['name_err'];
                                            unset($_SESSION['name_err']);
                                            ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email"
                                           value="<?php echo $single_data['email'] ?>">
                                    <?php if (isset($_SESSION['email_err'])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['email_err'];
                                            unset($_SESSION['email_err']);
                                            ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass" value="<?php echo $single_data['password'] ?>">
                                    <?php if (isset($_SESSION['pass_err'])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['pass_err'];
                                            unset($_SESSION['pass_err']);
                                            ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12" style="width: 100%">
                                <div class="input-group">
                                    <label class="label">Repassword</label>
                                    <input class="input--style-4" type="password" name="repass" value="<?php echo $single_data['password'] ?>">
                                    <?php if (isset($_SESSION['repass_err'])) { ?>
                                        <div class="alert alert-danger">
                                            <?php
                                            echo $_SESSION['repass_err'];
                                            unset($_SESSION['repass_err']);
                                            ?>

                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="label">Gender</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" name="gender"
                                                   value="male" <?php if ($single_data['gender']=='male' ){echo "checked";} ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender"
                                                   value="female" <?php if ($single_data['gender']=='female' ){echo "checked";} ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="label">Role</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role">
                                    <option value="">Choose option</option>
                                    <option value="1" <?php if ($single_data['role']=='1' ){echo "selected";} ?> >Admin
                                    </option>
                                    <option value="2" <?php if ($single_data['role']=='2' ){echo "selected";} ?> >Editor
                                    </option>
                                    <option value="3" <?php if ($single_data['role']=='3' ){echo "selected";} ?> >Modaretor
                                    </option>
                                </select>
                                <div class="select-dropdown"></div>
                                <?php if (isset($_SESSION['role_err'])) { ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        echo $_SESSION['role_err'];
                                        unset($_SESSION['role_err']);
                                        ?>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label >Update Image</label>

                            <input type="file" name="photo" id="image" onchange="loadfile(event)" >
                            <img src="user-img/<?php echo $single_data['photo']; ?>" id="preimage" width="200px" height="200px">

                            <?php if (isset($_SESSION['img_err'])){ ?>
                                <div class="alert alert-danger">
                                    <?php
                                    echo $_SESSION['img_err'];
                                    unset($_SESSION['img_err']);
                                    ?>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!--javascript for image preview-->
<script type="text/javascript">
    function loadfile(event) {
        var output=document.getElementById('preimage');
        output.src=URL.createObjectURL(event.target.files[0]);
    }
</script>

<?php
require 'reg-assets/reg-footer.php';
require 'des_assets/admin-footer.php';
?>