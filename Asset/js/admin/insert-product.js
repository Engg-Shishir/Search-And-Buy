$(document).ready(function () {

  // Reset Product Form
  function resetProductForm($whoCallme) {
    $("#product").trigger("reset");

    //  Reset or clear select2 field
    jQuery(".select2").select2({
      placeholder: "Select an option",
      allowClear: true,
    });

    $("#preview").html("");
    $("#summernote").summernote("code", "");
    if ($whoCallme == "update") $("#exampleModal").modal("toggle");
  }
  $(".inserProductModalCloseBtn").on("click", () => {
    resetProductForm("");
  });




  // Load Product
  loadProduct(1, "", 5);
  function loadProduct(page, query, limit) {
    $.ajax({
      url: "./action/load-product.php",
      method: "POST",
      data: { page: page, query: query, limit: limit, action: "load" },
      dataType: "json",
      beforeSend: function () {
        $("#searchSpiner").css("opacity", "1");
      },
      success: function (response) {
        $("#searchSpiner").css("opacity", "0");

        var data = "";
        var total = response.length;
        if (total > 0) {
          $("tbody").remove();
          $("thead").after("<tbody></tbody>");
          $("tbody").html();

          $("#link").html(response[total - 1]);
          $.each(response, function (key, value) {
            var perseImage = JSON.parse(value.image);

            if (key < total - 1) {
              $('<tr class="text-center">')
                .html(
                  "<td ><img height='50pxpx' width='50px' src='../Asset/image/product/" +
                    value.sno +
                    "/" +
                    perseImage[0] +
                    "' /> </td>" +
                    "<td>" +
                    value.name +
                    "</td>" +
                    "<td>" +
                    value.price +
                    "</td>" +
                    "<td>" +
                    value.category +
                    "</td>" +
                    "<td>" +
                    value.quantity +
                    "</td>" +
                    "<td>" +
                    value.discount +
                    "</td>" +
                    "<td>" +
                    value.scharge +
                    "</td>" +
                    "<td class='shadow'> <a href='#' class='editProduct' data-sno='" +
                    value.id +
                    "'><i class='fas fa-pen'></i></a> <a href='#' class='deleteProduct' data-sno='" +
                    value.sno +
                    "'><i class='fas fa-trash text-danger'></i></a> <a href='./productDetails.php?sno=" +
                    value.sno +
                    "' class='viewProduct' data-id='" +
                    value.id +
                    "'><i class='fas fa-eye'></i></a></td>"
                )
                .appendTo("tbody");
            }
          });
        } else {
          $("#link").html("");
          var images = "../Asset/image/Fixed/noRecordFound.svg";
          data =
            data +
            "<tr><td colspan='8'> <img height='300px' src='" +
            images +
            "' /> </td></tr>";
          $("tbody").html(data);
        }
        setTimeout(() => {
          $("#searchSpiner").css("opacity", "0");
        }, 300);
      },
    });
  }






  //  Edit product
  $(document).on("click", ".editProduct", function () {
    $("#exampleModalLabel").html("Update Product");
    $("#insert_btn_product").html("Update");
    $("#exampleModal").modal("show");
    var sno = $(this).data("sno");
    $.ajax({
      url: "./action/edit-product-form.php",
      type: "POST",
      data: {
        sno: sno,
        actions: "edit",
      },
      dataType: "json",
      success: function (data) {
        var perseImage = JSON.parse(data.image);
        $("#sno").val(data.sno);
        $("#productName").val(data.name);
        $("#productPrice").val(data.price);
        // $("#productCategory").val(data.category); // This is work for general select dropdown
        $("#productCategory").select2("val", data.category); // If select element are Select2 plugin asociated, then you shold try this
        // $("#summernote").val(data.details);
        $("#summernote").summernote("code", data.details);
        $("#productQuantity").val(data.quantity);
        $("#productDiscount").val(data.discount);
        // $("#shipingCharge").val(data.scharge);  // This is work for general select dropdown
        $("#shipingCharge").select2("val", data.scharge);
        // preview.append(image);

        var append_image = "";
        perseImage.forEach((e) => {
          var image = "../Asset/image/product/" + data.sno + "/" + e;
          append_image +=
            "<img src='" +
            image +
            "' style='height:100px;width:100px; margin-right:3px;' />";
        });
        $("#preview").html(append_image);
      },
    });
  });






  $(document).on("click", ".deleteProduct", function () {
    var sirialNo = $(this).data("sno");
    Swal.fire({
      title: "Are you sure?",
      text: "delete this product",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "./action/delete-product.php",
          type: "POST",
          cache: false,
          data: {
            sno: sirialNo,
            action: "delete",
          },
          success: function (response) {
            if (response.includes("done")) {
              loadProduct(1, "", 5);
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
          },
        });
      }
    });
  });









  $("#product").submit(function (e) {
    e.preventDefault();

    var sno = $("#sno").val();
    var data = new FormData(this);
    if (sno == "") data.append("actions", "insert");
    else {
      var files = $("#images")[0].files.length;
      if (files > 0) {
        data.append("actions", "updateWithFile");
      } else {
        data.append("actions", "updateWithoutFile");
      }
    }

    $.ajax({
      type: "POST",
      url: "./action/product.php",
      enctype: "multipart/form-data",
      data: data,
      contentType: false,
      processData: false,
      beforeSend: function () {
        // alert();
      },
      success: function (response) {
        if (response.includes("success")) {
          toastr.success("Successfull !");
          loadProduct(1, "", 5);
        } else {
          toastr.error("Something wemt wrong !");
        }

        if (response.includes("UploadImageUpdatedData")) {
          setTimeout(() => {
            location.reload(true);
          }, 2000);
        } else {
          if (response.includes("Insert")) {
            resetProductForm("insert");
          } else {
            resetProductForm("update");
          }
        }
      },
    });
  });
});