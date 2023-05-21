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
  <title>Admin Product</title>
  <?php include_once("./layout/link-for-head-tag.php"); ?>
</head>

<body>
  <div class="containers">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include_once("./layout/navBar.php"); ?>
      <!-- Main Sidebar Container -->
      <?php include_once("./layout/sideBar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content pt-2">
          <div class="row">
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-12">
                  <?php

                  if (isset($_SESSION["successmesg"])) {
                    ?>


                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:0;">
                      <strong>
                        <?php echo $_SESSION["successmesg"]; ?>
                      </strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php
                    unset($_SESSION["successmesg"]);
                  }

                  ?>
                </div>
              </div>
              <div class="card card-default" style="border-radius:0;">
                <div class="card-header">
                  <h2 class="card-title"> <strong>Insert & Updete</strong> </h2>
                </div>
                <div class="card-body">
                  <form action="./action/category/insert.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="updatecategoryhiddenid" id="updatecategoryhiddenid" value="" />
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image" />
                        <label id="catlebel" class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="input-group mb-1">
                      <input type="text" name="catefild" class="form-control" placeholder="Enter name" id="catefild"  />
                    </div>
                    <div class="input-group mb-1">
                      <textarea name="description" class="form-control" rows="3" placeholder="Enter description" id="description"  spellcheck="false" ></textarea>
                    </div>
                    <div style="display:flex;align-items:center;justify-content:space-between; flex-direction:column;">
                      <div class="input-group mb-3 ml-auto">
                        <input type="submit" name="Insert" class="btn btn-info btn-flat form-control" value="Submit" />
                      </div>
                      <img src="../Asset/image/Default/product.png" alt="" width="50px" id="catpreviewimage">
                    </div>
                  </form>
                </div>

              </div>
            </div>
            <div class="col-md-7">
              <div class="card" style="border-radius:0;">
                <div class="card-header">
                  <h2 class="card-title"> <strong>Manage Category</strong> </h2>
                  <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                  </div>
                </div>

                <div class="card-body p-0">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Describtion</th>
                        <th style="width:10px;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $conn = mysqli_connect("localhost", "root", "", "searchbuy");
                      $sql = "SELECT * FROM category";
                      $resultset = mysqli_query($conn, $sql);
                      while ($row = mysqli_fetch_array($resultset)) {
                        ?>
                        <tr>
                          <td>
                            <img src="../Asset/image/admin/category/<?php echo $row["category_image"]; ?>" alt=""
                              width="80px" id="catpreviewimage">
                          </td>
                          <td>
                            <?php echo $row["category_name"]; ?>
                          </td>
                          <td>
                            <?php echo $row["description"]; ?>
                          </td>
                          <td style="display:flex;align-items:center;justify-content:center;">
                            <button data-id="<?php echo $row["category_id"]; ?>" style="border-radius:0;"
                              class="btn btn-warning mr-1 editcatbtn">
                              <i class="fas fa-pen"></i>
                            </button>

                            <form action="./action/category/delete.php" method="POST">
                              <input type="hidden" name="catid" value="<?php echo $row["category_id"]; ?>">
                              <input type="hidden" name="catname" value="<?php echo $row["category_name"]; ?>">
                              <button type="submit" name="hello" style="border-radius:0;" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                              </button>
                            </form>
                          </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
          <?php include_once "./component/inserProductModal.php"; ?>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    </div>
  </div>
  </div>




  <?php
  if (isset($_POST["Insert"])) {
    echo "fdgdfgdf";
  }
  ?>

  <?php
  include_once("./layout/link-for-body-tag.php");
  ?>

  <script>
    $(document).ready(function () {
      $(".select2").select2({
        placeholder: "Shishir Bhuiyan",
        closeOnSelect: true,
      });



      $("#customFile").change(function () {
        var file = $(this).get(0).files[0];
        $("#catlebel").text(file.name);
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#catpreviewimage").attr("src", reader.result);
        };
        reader.readAsDataURL(file);
      });


      $(".editcatbtn").click(function () {
        var id = $(this).data("id");
        $("#updatecategoryhiddenid").attr("value", id);
        $.ajax({
          type: "POST",
          url: "./action/category/fetch.php",
          data:{
            id: id,
          },
          dataType: "json",
          beforeSend: function () {
            
          },
          success: function (response) {
            // $('#catlebel').text(response.category_image);
            $("#catpreviewimage").attr("src", "../Asset/image/admin/category/"+response.category_image);
            $('#updatecategoryhiddenid').val(response.category_id);
            $('#catefild').val(response.category_name);
            $('#description').val(response.description);
            // $('input[name="description"]');
            console.log(response.category_name);
          },
        });
      });
    });
  </script>

  <!-- <script src="../Asset/js/admin/product.js"></script> -->
  <!-- <script src="../Asset/js/admin/load-product.js"></script> -->
  <!-- <script src="../Asset/js/admin/insert-product.js"></script> -->
</body>

</html>