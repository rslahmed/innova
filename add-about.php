<?php

require 'ses-check.php';

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>
    <link rel="stylesheet" href="custom.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .about-list-wrapper {
            position: relative;
            max-width: 300px;
            margin-bottom: 65px;
        }

        .about-list-wrapper input {
            padding: 8px 15px;
            border-radius: 5px;
            border: 1px solid #e0e4e8;
            margin-bottom: 10px;
        }

        .about-list-wrapper a.add-btn {
            position: absolute;
            bottom: -35px;
            padding: 8px 15px;
            display: inline-block;
            background: #7e7e7e;
            color: #fff;
            border-radius: 5px;
            transition: .3s;
            cursor: pointer;
        }

        .about-list-wrapper a.add-btn:hover {
            color: #fff;
            background: #7e7e7eb0;
        }

        .about-list-wrapper a.rmb-btn {
            position: absolute;
            right: -90px;
            padding: 8px 12px;
            background: red;
            border-radius: 5px;
            color: #fff;
            display: inline-block;
            cursor: pointer;
            transition: .3s;
        }

        .about-list-wrapper a.rmb-btn:hover {
            color: #fff;
            background: #ff3e3e;
        }


    </style>

    <main class="app-content no-padding">
        <div class="container mt-5 pt-5">
            <div class="row pt-3">
                <div class="col-lg-12 m-auto bg-light my-4 pt-2 pb-5 rounded">
                    <div class="form-title text-center py-2">
                        <h2 class=""><b>Add About</b></h2>
                    </div>
                    <form action="about_post.php" method="post" enctype="multipart/form-data">
                        <div class="form-group pt-2">
                            <input type="text" name="about_title" class="form-control" placeholder="About Title" required>
                        </div>
                        <div class="form-group py-2">
                            <textarea name="about_text" class="form-control" rows="5" placeholder="About Text" required></textarea>
                        </div>
                        <div class="form-group py-2">
                            <input type="text" class="form-control" name="about_subtitle" placeholder="About Sub Title" required>
                        </div>

                        <!-- about list -->
                        <div class="about-list-wrapper">
                            <a class="add-btn" onclick="addBtn()">Add More List</a>
                            <input type="text" name="about_list[]" placeholder="Add about list">
                        </div>

                        <div class="form-group ">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">About Image</label>
                                <input type="file" name="about_img" class="form-control-file" onchange="loadfile(event)" required>
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

    <script>
        function addBtn() {
            // var form = document.getElementById('form');
            $('.about-list-wrapper').append('<a class="rmb-btn">Remove</a>');
            $('.about-list-wrapper').append('<input type="text" name="about_list[]" placeholder="Add about list">');
            $('.about-list-wrapper input:last-child').focus();
            // var x = document.createElement("INPUT");
            $(".about-list-wrapper a.rmb-btn").on("click",function(){
                $(this).next().remove();
                $(this).remove();
            })

        }

    </script>

<?php
require 'reg-assets/reg-footer.php';
require 'des_assets/admin-footer.php';
?>