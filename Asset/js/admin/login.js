$(function () {
  $("#login_button").on("click", function (e) {
    e.preventDefault();

    let email = $("#user_email").val();
    let password = $("#password").val();

    if (email == " " || password == "") {
      toastr.error("All field is required");
    } else {
      $.ajax({
        type: "POST",
        url: "./action/login.php",
        data: {
          email: $("#user_email").val(),
          password: $("#password").val(),
        },
        beforeSend: function () {
          $(".loader").css("opacity", "1");
          $("#login_button").prop("disabled", true);
          $(".login-btn-text").text("Processing..");
          // $(".spinner-border").css({'scale':'1', 'width':'20px'});
        },
        success: function (response) {
          if (response == "ok") {
            toastr.success("Connecting ...");
            setTimeout(() => {
              toastr.remove();
              $(".loader").css("opacity", "0");
              toastr.options.timeOut = 0;
              toastr.success("Login successfull !");
            }, 2000);

            setTimeout(() => {
              $("#login_button").prop("disabled", false);
              window.location.href = "home.php";
            }, 5000);
          } else {
            $(".loader").css("opacity", "0");
            $("#login_button").prop("disabled", false);
            $(".login-btn-text").text("Signin");
            toastr.error("Something going wrong!Try carefully");
          }
        },
      });
    }
  });
});
