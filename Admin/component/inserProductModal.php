<!-- Modal -->
<div class="modal fade modal-fullscreen" data-backdrop="static" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-focus="false">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header text-center bg-dark text-light">
        <h5 class="modal-title text-light" id="exampleModalLabel">Insert Product</h5>
        <button type="button" class="btn btn-danger shadow inserProductModalCloseBtn" data-dismiss="modal">
          <i class="fas fa-minus"></i>
        </button>
      </div>
      <div class="modal-body" id="productInsert">
        <form class="form-login" id="product">
          <div class="form-group d-flex align-items-center justify-content-center my-2">
            <div class="loader" style="border: 10px solid #f3f3f3;border-radius: 50%;border-top: 7px solid black;border-bottom: 7px solid red;width: 40px;height: 40px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite; opacity:0; display:none;"></div>
          </div>
          <div class="row my-auto  mt-3">
            <div class="col-md-12">
              <!-- hidden sno field -->
              <input type="hidden" name="sno" id="sno" value="">

              <div class="form-group">
                <label for="images" class="control-label">Images</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input rounded-circle" id="images" name="images[]" multiple="" onchange="displayImg(this)">
                  <label class="custom-file-label" for="images">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="d-flex align-items-center justify-content-center" id="preview">
                <img id="productInsertImagePreview" data-name="" src="" alt="" height="150px" width="150px" style="display:none;">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="productName">Name:</label>
                <input type="text" name="productName" class="form-control" placeholder="Product name" id="productName" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="productPrice">Price:</label>
                <input type="number" name="productPrice" class="form-control" placeholder="Product price" id="productPrice" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="productCategory">Category :</label>
                <select class="select2" name="productCategory" id="productCategory">
                  <option value=""></option>
                  <option value="0">Electric</option>
                  <option value="1">Electronics</option>
                  <option value="2">Education</option>
                  <option value="3">Cloth</option>
                  <option value="4">Food</option>
                  <option value="5">Gamming</option>
                  <option value="6">Medicine</option>
                  <option value="7">Cosmatics</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="shipingCharge">Shiping Charage:</label>
                <select class="form-control select2" name="shipingCharge" id="shipingCharge">
                  <option class="mb-1 place" value=""></option>
                  <option value="0">Free</option>
                  <option value="1">20</option>
                  <option value="2">35</option>
                  <option value="3">50</option>
                  <option value="4">100</option>
                  <option value="5">200</option>
                  <option value="6">300</option>
                  <option value="7">400</option>
                  <option value="8">500</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group ">
                <label for="productQuantity">Quantity:</label>
                <input type="number" name="productQuantity" class="form-control" placeholder="Product quantity" id="productQuantity" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="productDiscount
                        ">Discount:</label>
                <input type="number" name="productDiscount" class="form-control" placeholder="Product discount" id="productDiscount" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group ">
                <label for="productDetails">Product Details:</label>
                <textarea name="productDetails" id="summernote" class="form-control"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group d-flex align-items-center justify-content-end mt-3">
            <button type="submit" class="btn btn-dark" id="insert_btn_product">Insert
            </button>
            <button type="button" class="btn btn-danger shadow ml-1 inserProductModalCloseBtn" data-dismiss="modal">
              Close
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>