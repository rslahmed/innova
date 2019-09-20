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
                        <h2 class=""><b>Add Logo</b></h2>
                    </div>
                    <form action="logo_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload your Logo</label>
                                <input type="file" name="logo_img" class="form-control-file" onchange="loadfile(event)" required>
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