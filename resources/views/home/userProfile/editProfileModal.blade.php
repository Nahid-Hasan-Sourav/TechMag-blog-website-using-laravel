<!--User Edit Modal -->
<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update User Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">


                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="user_name" class="form-control blog-title blog_title" id="user-name">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text" name="blog_title" class="form-control blog-title blog_title" id="user-location">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="horizontal-email-input" class="col-sm-3 col-form-label">About</label>
                            <div class="col-sm-9">
                                <textarea name="description" id="user-description" class="form-control blog-description" placeholder="" id="about" rows="10"></textarea>
                            </div>
                        </div>


                        <div class="form-group row mb-4">
                            {{-- <label for="horizontal-password-input" class="col-sm-3 col-form-label">Profile Img</label> --}}

                                <div class="col-sm-9 text-center">
                                    <div class="text-center">
                                        <div class="asset-path-profile" data-asset="{{ asset('') }}"></div>
                                        <img id="profile-preview-image" src="" id="profile-photo" class="avatar rounded-circle" alt="profile photo" style="width:100px; height:100px ">
                                        <h6>Upload Your Profile Photo</h6>

                                        <input type="file" id="profile-image-input" class="form-control">
                                    </div>
                                </div>
                                <!-- Store the asset path in a data attribute -->


                        </div>

                        <div class="form-group row mb-4">
                            {{-- <label for="horizontal-password-input" class="col-sm-3 col-form-label">Cover Img</label> --}}
                            <div class="col-sm-9">
                                <div class="text-center">
                                    <div class="asset-path-cover" data-asset="{{ asset('') }}"></div>
                                    <img id="cover-preview-image" src="//placehold.it/1000" class="" alt="cover photo" style="width:400px; height:160px ">
                                    <h6>Upload Cover photo</h6>

                                    <input type="file" id="cover-image-input" id="cover-photo" class="form-control">
                                </div>
                            </div>
                        </div>




                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" value="" class="btn btn-primary" id="user-profile-update-btn">Save changes</button>
        </div>
      </div>
    </div>
  </div>



