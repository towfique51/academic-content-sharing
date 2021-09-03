<!-- Modal-->
<!--begin::Modal-->
<div class="modal fade" id="varsityModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Varsity Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <form id="varsity_add" class="form">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" id="varsity_name" class="form-control" placeholder="Enter varsity name" />
                        <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group">
                        <label>Short Name <span class="text-danger">*</span></label>
                        <input type="text" id="varsity_short_name" class="form-control" placeholder="Enter varsity short name" />
                    </div>
                    <div class="form-group">
                        <label>Slug<span class="text-danger">*</span></label>
                        <input type="text" id="varsity_slug" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <select class="form-control select2" id="departmentselect" name="param" multiple="multiple">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mr-2" data-dismiss="modal">Close</button>
                    <button type="button" id="varsity_submit" class="btn btn-secondary" data-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--end::Modal-->


<div class="modal fade" id="departmentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="department_add">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input type="text" id="department_name" class="form-control" placeholder="Enter department name" />
                        </div>
                        <div class="form-group">
                            <label>Short Name <span class="text-danger">*</span></label>
                            <input type="text" id="department_short_name" class="form-control" placeholder="Enter varsity short name" />
                        </div>
                        <div class="form-group">
                            <label>Slug<span class="text-danger">*</span></label>
                            <input type="text" id="department_slug" class="form-control"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" id="department_submit" class="btn btn-primary font-weight-bold" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>