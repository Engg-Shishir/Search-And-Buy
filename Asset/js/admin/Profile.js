$("document").ready(function () {
  getdata();

  $("#update_profile_button").click(function (e) {
    e.preventDefault();

    var data = new FormData();
    let name = $("#name").val();
    let email = $("#user_email").val();
    let password = $("#password").val();
    let phone = $("#phone").val();
    var image = $("#file")[0].files[0];

    if (image) data.append("image", image);

    data.append("name", name);
    data.append("email", email);
    data.append("phone", phone);
    data.append("password", password);
    data.append("action", "update");

    $.ajax({
      type: "POST",
      url: "./action/profile.php",
      enctype: "multipart/form-data",
      data: data,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".loader").css("opacity", "1");
        $("#update_profile_button").prop("disabled", true);
      },
      success: function (response) {
        if (response.includes("success")) {
          setTimeout(() => {
            $(".loader").css("opacity", "0");

            $("#update_profile_button").prop("disabled", false);
            toastr.success("Successfully Updating...");
          }, 2000);

          if (response.includes("image")) {
            setTimeout(() => {
              $("#sidebar_profile_logo").attr("src", "");
              getdata();
              location.reload(true);
            }, 5000);
          } else {
            getdata();
          }
        } else {
          toastr.error("Something going wrong", "Try again !");
        }
      },
    });
  });

  function getdata() {
    $.ajax({
      type: "POST",
      url: "./action/profile.php",
      data: {
        action: "load",
      },
      dataType: "json",
      beforeSend: function () {
        // alert("Do you want");
      },
      success: function (response) {
        $("#sidebar_profile_name").text(response.name);
        var img =
          "<img class=' shadow' id='profile_photo_show' src='../Asset/image/admin/" +
          response.photo +
          "'   height='200px' width='100%'>";
        $("#profileImageShowDiv").html(img);

        $("#phone").val(response.phone);

        $("#name").val(response.name);
        $("#user_email").val(response.email);
        $("#password").val(response.pass);
        $("#file").val("");
      },
    });
  }

  $("#show_hide_password").click(function () {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
      $("#password").attr("type", "password");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    }
  });

  $("#file").change(function () {

    var file = $(this).get(0).files[0];

    if (file) {
      var extension = $(this).val().split(".").pop().toLowerCase();
      var validFileExtensions = ["jpeg", "jpg", "png"];
      if ($.inArray(extension, validFileExtensions) == -1) {
        toastr.error("Should be jpg,png,jpeg", "Wrong file selected");
      } else {
        var MB = Math.floor(file.size / 1024000); // in MB
        if (MB > 1) {
          toastr.error("Should less then 3MB", "Large selected");
        } else {
          var reader = new FileReader();
          reader.onload = function (e) {
            $("#sidebar_profile_logo").attr("src", reader.result);
            $("#profile_photo_show").attr("src", reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
    }
  });
});
