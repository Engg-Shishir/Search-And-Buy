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