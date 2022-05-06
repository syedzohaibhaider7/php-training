<?php
include "edit.php";

$id = $_GET['id'];
$edit = new Edit($id);
$row = $edit->getData();
?>

<title>Edit User</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var nameValidation = /^([a-zA-Z])+(\s{0,1}([a-zA-Z]))*$/;
    var passValidation = /^([a-zA-Z0-9`~!@#$%^&*()_+-=[\]{};:'",<.>/\|\\])+(\s{0,1}([a-zA-Z0-9`~!@#$%^&*()_+-=[\]{};:'",<.>/\|\\]))*$/;
    var emailValidation = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]))+(\.+([a-zA-Z0-9]{2,4})){1,2}$/;
    $(document).ready(function() {
        var error = false;
        $("span").hide();

        $("#name").keyup(function() {
            let fName = $(this).val();
            if (fName.length == 0) {
                $("#err-name").show();
                $("#err-name").html(" * enter name");
                error = true;
            } else if (fName.length > 50) {
                $("#err-name").show();
                $("#err-name").html(" * name length should be upto 50 characters");
                error = true;
            } else if (!nameValidation.test(fName)) {
                $("#err-name").show();
                $("#err-name").html(" * invalid name");
                error = true;
            } else {
                $("#err-name").hide();
            }
        });

        $("#passwd").keyup(function() {
            let password = $(this).val();
            if (password.length == 0) {
                $("#err-passwd").show();
                $("#err-passwd").html(" * enter password");
                error = true;
            } else if (!passValidation.test(password)) {
                $("#err-passwd").show();
                $("#err-passwd").html(" * invalid password");
                error = true;
            } else if (password.length < 6 || password.length > 12) {
                $("#err-passwd").show();
                $("#err-passwd").html(" * password length should be between 6 to 12 characters");
                error = true;
            } else {
                $("#err-passwd").hide();
            }
        });

        $("#email").keyup(function() {
            let mail = $(this).val();
            if (mail.length == 0) {
                $("#err-email").show();
                $("#err-email").html(" * enter email");
                error = true;
            } else if (!emailValidation.test(mail)) {
                $("#err-email").show();
                $("#err-email").html(" * invalid email");
                error = true;
            } else {
                $("#err-email").hide();
            }
        });
        $("#age").keyup(function() {
            let userAge = $(this).val();
            if (userAge.length == 0) {
                $("#err-age").show();
                $("#err-age").html(" * enter age");
                error = true;
            } else if (userAge <= 0) {
                $("#err-age").show();
                $("#err-age").html(" * invalid age");
                error = true;
            } else {
                $("#err-age").hide();
            }
        });
        $("#gender").click(function() {
            let userGender = $(this).val();
            if (userGender == "select") {
                $("#err-gender").show();
                $("#err-gender").html(" * enter gender");
                error = true;
            } else {
                $("#err-gender").hide();
            }
        });

        $("form").submit(function() {
            var image_name = $("#image").val();
            var extension = $("#image").val().split(".").pop().toLowerCase();
            if (image_name == "") {
                $("#err-image").show();
                $("#err-image").html(" * upload picture");
                return false;
            } else if ($.inArray(extension, ["gif", "png", "jpg", "jpeg", "jfif", "bmp"]) == -1) {
                $("#err-image").show();
                $("#err-image").html(" * invalid file");
                return false;
            } else {
                $("#err-image").hide();
            }
            if (error) {
                return false;
            }
        });
    });

    function genderSelect() {
        let genderSelect = '<?php echo $row->{"gender"}; ?>';
        if (genderSelect == "male") {
            $('select option[value="male"]').attr("selected", true);
        } else if (genderSelect == "female") {
            $('select option[value="female"]').attr("selected", true);
        } else if (genderSelect == "other") {
            $('select option[value="other"]').attr("selected", true);
        }
    }
    window.onload = function() {
        genderSelect();
    };
</script>

<h1>Update Information</h1>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row->{"id"}; ?>">
    <div>
        <label>Picture: </label>
        <input type="file" id="image" name="image">
        <span id="err-image" style="color: red;"></span>
    </div>
    <br>
    <div>
        <label>Full Name: </label>
        <input type="text" id="name" name="name" value="<?php echo $row->{"fName"}; ?>">
        <span id="err-name" style="color: red;"></span>
    </div>
    <div>
        <label>Password: </label>
        <input type="password" id="passwd" name="passwd" value="<?php echo $row->{"passwd"}; ?>">
        <span id="err-passwd" style="color: red;"></span>
    </div>
    <div>
        <label>Email: </label>
        <input type="email" id="email" name="email" value="<?php echo $row->{"email"}; ?>">
        <span id="err-email" style="color: red;"></span>
    </div>
    <div>
        <label>Age: </label>
        <input type="number" id="age" name="age" value="<?php echo $row->{"age"}; ?>">
        <span id="err-age" style="color: red;"></span>
    </div>
    <br>
    <div>
        <label for="gender">Gender: </label>
        <select name="gender" id="gender">
            <option value="select">---</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <span id="err-gender" style="color: red;"></span>
    </div>
    <br>
    <input name="submit" type="submit">
</form>