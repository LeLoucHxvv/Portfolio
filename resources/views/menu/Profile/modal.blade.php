<div class="modal fade" id="profile-modal" tabindex="-1" aria-labelledby="profile-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content d-none" id="edit-profile">
            <div class="modal-header">
                <h3 class="modal-title" id="editing-profile">Personal (Edit)</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-profile-form">
                @csrf
                <div class="modal-body pt-0 pb-0">
                    <div class="row">
                        <div class="col-6">
                            <input type="file" id="image" class="dropify" data-height="400" name="img" data-default-file="{{ asset('storage/folder/'.$profile->img) }}">
                       </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $profile->name }}" required >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Address</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ $profile->location }}" required >
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Birthdate</label>
                                        <input type="text" class="form-control" id="bday" name="bday"
                                            value="{{ $profile->bday }}" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Mobile Number</label>
                                        <div class="row">
                                            <div>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    value="{{ $profile->mobile_number }}" required >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    value="{{ $profile->website }}" required >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $profile->email }}" required >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submit-edit-profile">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
