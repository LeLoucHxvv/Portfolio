<div class="modal fade" id="portfolio-modal" tabindex="-1" aria-labelledby="portfolio-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content d-none" id="add-portfolio">
            <div class="modal-header" style="background-color: #749bff;;">
                <h5 class="modal-title" id="portfolio-modal-label">Add portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" enctype="multipart/form-data" id="add-portfolio-form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="file" id="input-file-now-custom-2" class="dropify" data-height="250"
                                name="img">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="exampleInputName1"><strong
                                    style="font-size: 15px;">Name:</strong></label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputName1"><strong
                                    style="font-size: 15px;">Detail:</strong></label>
                                <input type="text" class="form-control" id="detail" name="detail" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputName1 mt-1"><strong
                                    style="font-size: 15px;">Year Created:</strong></label>
                                <input type="text" class="form-control" id="year_created" name="year_created"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-inverse-warning" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-inverse-primary" id="submit-add-portfolio">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-content d-none" id="view-portfolio">
            <div class="modal-header" style="background-color: #749bff;">
                <h3 class="modal-title" id="portfolio-modal-label">View portfolio</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="" class="img-fluid rounded" style="display: block; margin: 0 auto;"
                                alt="profile" id="view-img">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center mt-0">
                        <div class="form-group row align-items-center">
                            <label for="view-name" class="col-sm-2 col-form-label"><strong
                                    style="font-size: 15px;">Name:</strong></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="view-name" name="name" readonly>
                            </div>
                            <label for="view-name" class="col-sm-2 col-form-label"><strong
                                    style="font-size: 15px;">Detail:</strong></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="view-detail" name="detail" readonly>
                            </div>
                            <label for="view-name" class="col-sm-2 col-form-label"><strong
                                style="font-size: 15px;">Year Created:</strong></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="view-year_created" name="year_created"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
