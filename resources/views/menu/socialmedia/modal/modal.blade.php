<div class="modal fade" id="socmed-modal" tabindex="-1" aria-labelledby="socmed-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content d-none" id="add-socmed">
            <div class="modal-header" style="background-color:#749bff;">
                <h5 class="modal-title" id="socmed-modal-label">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" action="post" id="add-socmed-form">
                <div class="row mb-0">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Social Media
                                                    Link:</strong></label>
                                            <input type="text" class="form-control" id="link" name="link"
                                                value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Social Media
                                                    Type:</strong></label>
                                            <select class="form-control" id="type" name="type" required>
                                                <option value="instagram">Instagram</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="youtube">YouTube</option>
                                                <option value="tiktok">TikTok</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="github">Github</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-add-socmed">Submit</button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="edit-socmed">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="editing-name">Social Media (Edit)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-socmed-form">
                @csrf
                <div class="row mb-0">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Social Media
                                                    Link:</strong></label>
                                            <input type="text" class="form-control" id="edit-link" name="edit-link"
                                                value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Social Media
                                                    Type:</strong></label>
                                            <select class="form-control" id="edit-type" name="edit-type" required>
                                                <option value="instagram">Instagram</option>
                                                <option value="facebook">Facebook</option>
                                                <option value="youtube">YouTube</option>
                                                <option value="tiktok">TikTok</option>
                                                <option value="twitter">Twitter</option>
                                                <option value="github">Github</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-edit-socmed">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
