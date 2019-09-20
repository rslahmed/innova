<?php

require 'ses-check.php';

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>
<link rel="stylesheet" href="custom.css">

<main class="app-content no-padding">
    <div class="container mt-5 pt-5">
        <div class="row pt-3">
            <div class="col-lg-12 m-auto bg-light my-4 pt-2 pb-5 rounded">
                <div class="form-title text-center py-2">
                    <h2 class=""><b>Add Banner</b></h2>
                </div>
                <form action="banner_post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group pt-2">
                        <input type="text" name="banner_title" class="form-control" placeholder="Banner Title" required>
                    </div>
                    <div class="form-group py-2">
                        <textarea name="banner_text" class="form-control" rows="5" placeholder="Banner Text" required></textarea>
                    </div>
                    <div class="form-group py-2">
                        <input type="text" class="form-control" name="banner_btn" placeholder="Button Name" required>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Background Image</label>
                            <input type="file" name="banner_img" class="form-control-file" onchange="loadfile(event)" required>
                            <img  id="preimage" width="200px" height="200px">
                        </div>

                        <?php if (isset($_SESSION['img_err'])){ ?>
                            <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['img_err'];
                                unset($_SESSION['img_err']);
                                ?>

                            </div>
                        <?php } ?>

                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
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