$("document").ready(function () {
  getdata();
  function getdata() {
    $.ajax({
      type: "POST",
      url: "../Action/userSidebarData.php",
      data: {
        action: "load",
      },
      dataType: "json",
      beforeSend: function () {
        // alert("Do you want");
      },
      success: function (response) {
        $("#sidebar_profile_name").text(response.name);
        $("#sidebar_profile_logo").attr(
          "src",
          "../Asset/Image/" + response.photo
        );
      },
    });
  }
});
