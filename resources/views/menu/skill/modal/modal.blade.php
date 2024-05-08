<div class="modal fade" id="skill-modal" tabindex="-1" aria-labelledby="skill-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content d-none" id="add-skill">
            <div class="modal-header" style="background-color: #749bff;">
                <h5 class="modal-title" id="skill-modal-label">Add Skill</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" action="post" id="add-skill-form">
                <div class="row mb-0">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                style="font-size: 15px;">Skill:</strong></label>
                                            <input type="text" class="form-control" id="skill" name="skill"
                                                value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                style="font-size: 15px;">Year Experience:</strong></label>
                                            <input type="text" class="form-control" id="ye" name="ye"
                                                value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                style="font-size: 15px;">Icon:</strong></label>
                                            <input type="text" class="form-control" id="icon" name="icon"
                                                value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-add-skill">Submit</button>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="edit-skill">
            <div class="modal-header" style="background-color:#749bff;">
                <h5 class="modal-title" id="editing-name">Skill(Edit)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="edit-skill-form">
                @csrf
                <div class="row mb-0">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for=""><strong
                                                    style="font-size: 15px;">Skill:</strong></label>
                                            <input type="text" class="form-control" id="edit-skills"
                                                name="edit-skills" value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                style="font-size: 15px;">Year Experience:</strong></label>
                                            <input type="text" class="form-control" id="edit-ye" name="edit-ye"
                                                value="" required>
                                        </div>
                                        <div class="form-group col-md-12 mt-2">
                                            <label for=""><strong
                                                style="font-size: 15px;">Icon:</strong></label>
                                            <input type="text" class="form-control" id="edit-icon" name="edit-icon"
                                                value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer pt-0 mt-0 justify-content-between">
                    <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-inverse-primary" id="submit-edit-skill">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
