<?php

require 'ses-check.php';

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>
<link rel="stylesheet" href="custom.css">

<main class="app-content no-padding">
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST" action="reg-post.php" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">name</label>
                                    <input class="input--style-4" type="text" name="fname" value="<?php if (isset($_SESSION['fname'])){echo $_SESSION['fname']; unset($_SESSION['fname']); } ?>">
                                    <?php if (isset($_SESSION['name_err'])){ ?>
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
                            <div class="col-12" style="width: 100%">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php if (isset($_SESSION['email'])){echo $_SESSION['email']; unset($_SESSION['email']);} ?>">
                                    <?php if (isset($_SESSION['email_err'])){ ?>
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
                            <div class="col-12" style="width: 100%">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="pass">
                                    <?php if (isset($_SESSION['pass_err'])){ ?>
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
                                    <input class="input--style-4" type="password" name="repass">
                                    <?php if (isset($_SESSION['repass_err'])){ ?>
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
                                            <input type="radio" name="gender" value="male" <?php if (!empty($_SESSION['gender'])){ if ($_SESSION['gender']=='male'){echo "checked"; unset($_SESSION['gender']);} } ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female" <?php if (!empty($_SESSION['gender'])){ if ($_SESSION['gender']=='female'){echo "checked"; unset($_SESSION['gender']);} } ?> >
                                            <span class="checkmark"></span>
                                        </label>
                                        <?php if (isset($_SESSION['gender_err'])){ ?>
                                            <div class="alert alert-danger">
                                                <?php
                                                echo $_SESSION['gender_err'];
                                                unset($_SESSION['gender_err']);
                                                ?>

                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="label">Role</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="role">
                                    <option value="">Choose option</option>
                                    <option value="1" <?php if (!empty($_SESSION['role'])){ if ($_SESSION['role']=='1'){echo "selected"; unset($_SESSION['role']);} } ?> >Admin</option>
                                    <option value="2" <?php if (!empty($_SESSION['role'])){ if ($_SESSION['role']=='2'){echo "selected"; unset($_SESSION['role']);} } ?> >Editor</option>
                                    <option value="3" <?php if (!empty($_SESSION['role'])){ if ($_SESSION['role']=='3'){echo "selected"; unset($_SESSION['role']);} } ?> >Modaretor</option>
                                </select>
                                <div class="select-dropdown"></div>
                                <?php if (isset($_SESSION['role_err'])){ ?>
                                    <div class="alert alert-danger">
                                        <?php
                                        echo $_SESSION['role_err'];
                                        unset($_SESSION['role_err']);
                                        ?>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
<!--                        img upload-->
                        <div class="form-group mt-4">
                            <label >Upload Image</label>

                            <input type="file" name="photo" id="image" onchange="loadfile(event)" >
                            <img  id="preimage" width="200px" height="200px">

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