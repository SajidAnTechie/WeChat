<!-- modal fade for Join Group -->

<div class="modal fade" id="darkModalFormforjoingroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Your group</strong> <a
              class="green-text font-weight-bold"><strong>Name</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->

                <form action="" method="post">
                  <div class="md-form pb-3">
                      <input type="text" id="Form-pass5" name="join_group_code" class="form-control validate white-text">
                      <label data-error="wrong" id="for-label" data-success="right" for="Form-pass5">Group code</label>
                  </div>

                  <!--Grid row-->
                  <div class="row d-flex align-items-center mb-4">
                      <div class="text-center mb-3 col-md-12">
                      <button type="submit" name="join_group" class="btn btn-success btn-block btn-rounded z-depth-1">Join group</button>
                      </div>
                  </div>
                </form>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- modal fade for Create Group -->

    <div class="modal fade" id="darkModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
  <div class="modal-dialog form-dark" role="document">
    <!--Content-->
    <div class="modal-content card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
      <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
        <!--Header-->
        <div class="modal-header text-center pb-4">
          <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Create group</strong> <a
              class="green-text font-weight-bold"><strong>Name</strong></a></h3>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--Body-->
        <div class="modal-body">
          <!--Body-->
          <form action="" method="post">
                <div class="md-form mb-5">
                    <input type="text" id="Form-email5" name="group_name" class="form-control validate white-text">
                    <label data-error="wrong" id="for-label" data-success="right" for="Form-email5">Group name</label>
                </div>

                <div class="md-form pb-3">
                    <input type="text" id="Form-pass5" name="group_code" class="form-control validate white-text">
                    <label data-error="wrong" id="for-label" data-success="right" for="Form-pass5">Group code</label>
                </div>

                <div class="md-form pb-3">
                    <input type="text" id="Form-pass5" name="block_code" class="form-control validate white-text">
                    <label data-error="wrong" id="for-label" data-success="right" for="Form-pass5">Block code</label>
                </div>

                <!--Grid row-->
                <div class="row d-flex align-items-center mb-4">
                    <div class="text-center mb-3 col-md-12">
                    <button type="submit" name="create_group" class="btn btn-success btn-block btn-rounded z-depth-1">Create group</button>
                    </div>
                </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

