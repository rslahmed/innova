<?php
require 'ses-check.php';
require 'db.php';
$id = $_GET['id'];
$select_data = "SELECT * FROM abouts WHERE id='$id'";
$select_con = mysqli_query($db, $select_data);
$single_data = mysqli_fetch_assoc($select_con);

require 'des_assets/admin-header.php';
require 'reg-assets/reg-header.php';
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="custom.css">
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
                        <h2 class=""><b>Edit Banner</b></h2>
                    </div>
                    <form action="update_about.php" method="post" enctype="multipart/form-data">
                        <input hidden class="input--style-4" type="text" name="id" value="<?php echo $single_data['id'] ?>">
                        <div class="form-group pt-2">
                            <input type="text" name="about_title" class="form-control" placeholder="About Title" value="<?php echo $single_data['about_title'] ?>" required>
                        </div>
                        <div class="form-group py-2">
                            <textarea name="about_text" class="form-control" rows="5" placeholder="About Text" required><?php echo $single_data['about_text'] ?></textarea>
                        </div>
                        <div class="form-group py-2">
                            <input type="text" class="form-control" name="about_subtitle" placeholder="About subtitle" value="<?php echo $single_data['about_subtitle'] ?>" required>
                        </div>
                            <div class="about-list-wrapper">
                                <a class="add-btn" onclick="addBtn()">Add More List</a>
                                <?php
                                $after_explode = explode('*',$single_data['about_list']);
                                foreach ($after_explode as $value){ ?>
                                    <a class="rmb-btn" onclick="rmBtn()">Remove</a>
                                    <input type="text" name="about_list[]" placeholder="Add about list" value="<?php echo $value ?>">
                                <?php }  ?>
                            </div>
                        <div class="form-group ">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">About Image</label>
                                <input type="file" name="about_img" class="form-control-file" onchange="loadfile(event)">
                                <img src="uploads/abouts/<?php echo $single_data['about_img']?>"  id="preimage" width="200px" height="200px">
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
        function addBtn() {
            // var form = document.getElementById('form');
            $('.about-list-wrapper').append('<a class="rmb-btn">Remove</a>');
            $('.about-list-wrapper').append('<input type="text" name="about_list[]" placeholder="Add about list">');
            $('.about-list-wrapper input:last-child').focus();
            // var x = document.createElement("INPUT");
            // x.setAttribute("type", "text");
            // x.setAttribute("name", "fname[]");
            // // document.body.appendChild(x);
            // document.getElementById("form").appendChild(x);

            // $('form').wrapInner('<a ' + $(form).html() + '" />');
                $(".about-list-wrapper a.rmb-btn").on("click",function(){
                    $(this).next().remove();
                    $(this).remove();
                })
            }

            $(".about-list-wrapper .rmb-btn").click(function(){
                $(this).next().remove();
                this.remove('.rmb-btn');
            });


    </script>

<?php
require 'reg-assets/reg-footer.php';
require 'des_assets/admin-footer.php';
?>