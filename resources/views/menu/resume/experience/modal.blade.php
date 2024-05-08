<div class="modal fade" id="experience-modal" tabindex="-1" aria-labelledby="experience-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content d-none" id="add-experience">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="experience-modal-label">Add Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" action="post" id="add-experience-form">
                <div class="modal-body pt-0 pb-0">
                    <div class="row mb-0">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for=""><strong
                                                        style="font-size: 15px;">Job:</strong></label>
                                                <input type="text" class="form-control" id="job" name="job"
                                                    value="" required>
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for=""><strong style="font-size: 15px;">Year
                                                        Experience:</strong></label>
                                                <input type="text" class="form-control" id="year_experience"
                                                    name="year_experience" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-2">
                                        <label for=""><strong style="font-size: 15px;">Company
                                                Name:</strong></label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            value="" required>
                                    </div>
                                    <div class="form-group col-md-12 mt-2">
                                        <label for=""><strong style="font-size: 15px;">Summary:</strong></label>
                                        <input type="text" class="form-control" id="summary" name="summary"
                                            value="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-add-experience">Submit</button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="edit-experience">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="editing-name">Experience (Edit)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-experience-form">
                @csrf
                <div class="modal-body pt-0 pb-0">
                    <div class="row mb-0">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Job:</strong></label>
                                            <input type="text" class="form-control" id="edit-job" name="edit-job">
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">Year
                                                    Experience:</strong></label>
                                            <input type="text" class="form-control" id="edit-ye" name="edit-ye">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-2">
                                    <label for=""><strong style="font-size: 15px;">Company
                                            Name:</strong></label>
                                    <input type="text" class="form-control" id="edit-companyName"
                                        name="edit-companyName">
                                </div>
                                <div class="form-group col-md-12 mt-2">
                                    <label for=""><strong style="font-size: 15px;">Summary:</strong></label>
                                    <input type="text" class="form-control" id="edit-summary"
                                        name="edit-summary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-edit-experience">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
