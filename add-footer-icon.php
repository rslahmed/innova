<?php

require 'ses-check.php';

require 'db.php';
//footer icon data
$icons_data = "SELECT * FROM footer_icons ";
$icons_con = mysqli_query($db, $icons_data);
$single_icon = mysqli_fetch_assoc($icons_con);

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>
    <link rel="stylesheet" href="custom.css">

    <main class="app-content no-padding">
        <div class="container mt-5 pt-5">
            <div class="row pt-3">
                <div class="col-lg-12 m-auto bg-light my-4 pt-2 pb-5 rounded">
                    <div class="form-title text-center py-2">
                        <h2 class=""><b>Footer Icons</b></h2>
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
                    </div>
                    <form action="footer_icon_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group pt-2">
                            <label><h3>Icon 1</h3></label>
                            <select name="icon_1" id="" class="form-control" >
                                <option value="">Select Icon 1</option>
                                <option value="fa fa-facebook" <?php if (!empty($single_icon['icon_1']) && $single_icon['icon_1']== 'fa fa-facebook'){echo 'selected';} ?> >Facebook</option>
                                <option value="fa fa-twitter" <?php if (!empty($single_icon['icon_1']) && $single_icon['icon_1']== 'fa fa-twitter'){echo 'selected';} ?> >Twitter</option>
                                <option value="fa fa-instagram" <?php if (!empty($single_icon['icon_1']) && $single_icon['icon_1']== 'fa fa-instagram'){echo 'selected';} ?> >Instagram</option>
                                <option value="fa fa-linkedin" <?php if (!empty($single_icon['icon_1']) && $single_icon['icon_1']== 'fa fa-linkedin'){echo 'selected';} ?> >linkedin</option>
                            </select>
                            <label class="mt-2"> #Link for icon 1</label>
                            <input type="text" name="icon_link_1" class="form-control" placeholder="#Link" value="<?php if (!empty($single_icon['icon_1'])){echo $single_icon['link_1'] ;} ?>">
                        </div>
                        <div class="form-group pt-2">
                            <label><h3>Icon 2</h3></label>
                            <select name="icon_2" id="" class="form-control" >
                                <option value="">Select Icon 2</option>
                                <option value="fa fa-facebook" <?php if (!empty($single_icon['icon_2']) && $single_icon['icon_2']== 'fa fa-facebook'){echo 'selected';} ?> >Facebook</option>
                                <option value="fa fa-twitter" <?php if (!empty($single_icon['icon_2']) && $single_icon['icon_2']== 'fa fa-twitter'){echo 'selected';} ?> >Twitter</option>
                                <option value="fa fa-instagram" <?php if (!empty($single_icon['icon_2']) && $single_icon['icon_2']== 'fa fa-instagram'){echo 'selected';} ?> >Instagram</option>
                                <option value="fa fa-linkedin" <?php if (!empty($single_icon['icon_2']) && $single_icon['icon_2']== 'fa fa-linkedin'){echo 'selected';} ?> >linkedin</option>
                            </select>
                            <label class="mt-2"> #Link for icon 2</label>
                            <input type="text" name="icon_link_2" class="form-control" placeholder="#Link" value="<?php if (!empty($single_icon['icon_2'])){echo $single_icon['link_2'] ;} ?>">
                        </div>
                        <div class="form-group pt-2">
                            <label><h3>Icon 3</h3></label>
                            <select name="icon_3" id="" class="form-control" >
                                <option value="">Select Icon 3</option>
                                <option value="fa fa-facebook" <?php if (!empty($single_icon['icon_3']) && $single_icon['icon_3']== 'fa fa-facebook'){echo 'selected';} ?> >Facebook</option>
                                <option value="fa fa-twitter" <?php if (!empty($single_icon['icon_3']) && $single_icon['icon_3']== 'fa fa-twitter'){echo 'selected';} ?> >Twitter</option>
                                <option value="fa fa-instagram" <?php if (!empty($single_icon['icon_3']) && $single_icon['icon_3']== 'fa fa-instagram'){echo 'selected';} ?> >Instagram</option>
                                <option value="fa fa-linkedin" <?php if (!empty($single_icon['icon_3']) && $single_icon['icon_3']== 'fa fa-linkedin'){echo 'selected';} ?> >linkedin</option>
                            </select>
                            <label class="mt-2"> #Link for icon 3</label>
                            <input type="text" name="icon_link_3" class="form-control" placeholder="#Link" value="<?php if (!empty($single_icon['icon_3'])){echo $single_icon['link_3'] ;} ?>">
                        </div>
                        <div class="form-group pt-2">
                            <label><h3>Icon 4</h3></label>
                            <select name="icon_4" id="" class="form-control" >
                                <option value="">Select Icon 4</option>
                                <option value="fa fa-facebook" <?php if (!empty($single_icon['icon_4']) && $single_icon['icon_4']== 'fa fa-facebook'){echo 'selected';} ?> >Facebook</option>
                                <option value="fa fa-twitter" <?php if (!empty($single_icon['icon_4']) && $single_icon['icon_4']== 'fa fa-twitter'){echo 'selected';} ?> >Twitter</option>
                                <option value="fa fa-instagram" <?php if (!empty($single_icon['icon_4']) && $single_icon['icon_4']== 'fa fa-instagram'){echo 'selected';} ?> >Instagram</option>
                                <option value="fa fa-linkedin" <?php if (!empty($single_icon['icon_4']) && $single_icon['icon_4']== 'fa fa-linkedin'){echo 'selected';} ?> >linkedin</option>
                            </select>
                            <label class="mt-2"> #Link for icon 4</label>
                            <input type="text" name="icon_link_4" class="form-control" placeholder="#Link" value="<?php if (!empty($single_icon['icon_4'])){echo $single_icon['link_4'] ;} ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
require 'reg-assets/reg-footer.php';
require 'des_assets/admin-footer.php';
?>