<div class="modal fade" id="education-modal" tabindex="-1" aria-labelledby="education-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content d-none" id="add-education">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="education-modal-label">Add Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" action="post" id="add-education-form">
                <div class="modal-body pt-0 pb-0">
                    <div class="row mb-0">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 mt-2">
                                                <label for=""><strong
                                                        style="font-size: 15px;">Master:</strong></label>
                                                <input type="text" class="form-control" id="master" name="master"
                                                    value="" required>
                                            </div>
                                            <div class="form-group col-md-12 mt-2">
                                                <label for=""><strong style="font-size: 15px;">School
                                                        Year:</strong></label>
                                                <input type="text" class="form-control" id="school_year"
                                                    name="school_year" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 mt-2">
                                        <label for=""><strong style="font-size: 15px;">Place of
                                                School:</strong></label>
                                        <input type="text" class="form-control" id="place_school" name="place_school"
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
                    <button type="submit" class="btn btn-inverse-primary" id="submit-add-education">Submit</button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="edit-education">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="editing-name">Education (Edit)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-education-form">
                @csrf
                <div class="modal-body pt-0 pb-0">
                    <div class="row mb-0">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12 ml-2">
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                    style="font-size: 15px;">Master:</strong></label>
                                            <input type="text" class="form-control" id="edit-master"
                                                name="edit-master">
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong style="font-size: 15px;">School
                                                    Year:</strong></label>
                                            <input type="text" class="form-control" id="edit-sy" name="edit-sy">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-2">
                                    <label for=""><strong style="font-size: 15px;">Place of
                                            School:</strong></label>
                                    <input type="text" class="form-control" id="edit-placeschool"
                                        name="edit-placeschool">
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
                    <button type="submit" class="btn btn-inverse-primary" id="submit-edit-education">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
