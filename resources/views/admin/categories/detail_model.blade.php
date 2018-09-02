<div class="modal-dialog" style="margin-top:300px">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" style="text-align:center">Category</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

            <div class="form-group clearfix">
                <div class="col-md-3">
                    <label>Name</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="" disabled value="{{ $categories->name}}">
                </div>
            </div>

            <div class="form-group clearfix">
                <div class="col-md-3">
                    <label>Description</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="" disabled value="{{ $categories->description}}">
                </div>
            </div>

            <div class="col-md-12 col-md-offset-5 clearfix" style="margin-top: 20px;text-align: center;">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>