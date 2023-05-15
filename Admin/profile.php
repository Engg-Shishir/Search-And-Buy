<!-- Session Check -->
<?php include_once("./action/sessionCheck.php"); ?>
<!-- Load Sidebar Profile Image -->
<?php include_once("./action/load-profile-image.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Profile</title>
    <?php include_once("./layout/link-for-head-tag.php"); ?>
    <link rel="stylesheet" href="../Asset/css/admin/profilepage.css">
</head>
<body>
</head>



<body>


  <div class="containers">
    <div class="wrapper">
      <?php include_once("./layout/navBar.php");  ?>
      <?php include_once("./layout/sideBar.php");  ?>
      <div class="content-wrapper">
        <section class="content">
          <div class="row pt-5">
            <div class="col-md-8 offset-2">
              <div class="row">
                <div class="col-md-3 mx-auto my-auto">

                  <div id="profileImageShowDiv"></div>

                </div>
                <div class="col-md-9">
                  <div class="card-body shadow-lg">
                    <form class="form-login" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-md-6">
                          <input type="text" class="form-control" placeholder="Your name" name="name" id="name" value="" />
                        </div>
                        <div class="col-md-6">
                          <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" id="user_email" />
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row  mt-3">
                        <div class="col-md-6 ">
                          <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Enter new password" id="password" />
                            <div class="input-group-prepend">
                              <span style="cursor:pointer;" class="input-group-text"><i id="show_hide_password" class="fas fa-eye-slash"></i></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Phone no" name="phone" id="phone" value="" />
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="file" name='file' required>
                              <label class="custom-file-label" for="customFile">Profile Photo</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr />
                      <div class="form-group d-flex align-items-center justify-content-between ">
                        <div class="loader" style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0;"></div>


                        <button type="button" class="btn btn-dark" id="update_profile_button">Update <i class="fas fa-location-arrow"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
  </div>
  </div>

  <?php
  include_once("./layout/link-for-body-tag.php");
  ?>
  <script src="../Asset/js/admin/Profile.js"></script>
</body>


</html>