<div class="modal-dialog" style="margin-top:300px">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title" style="text-align:center">Enquity Detail</h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="form-group clearfix">
                    <div class="col-md-3">
                        <label>Fullname</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="" disabled value="{{ $enquiry->first_name}} {{ $enquiry->last_name}}">
                    </div>
                </div>

                <div class="form-group clearfix">
                    <div class="col-md-3">
                        <label>Fullname</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="" disabled value="{{ $enquiry->first_name_cn}} {{ $enquiry->first_name_cn}}">
                    </div>
                </div>

                <div class="form-group clearfix">
                    <div class="col-md-3">
                        <label>Email</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="" disabled value="{{ $enquiry->email}}">
                    </div>
                </div>

                <div class="form-group clearfix">
                    <div class="col-md-3">
                        <label>Company</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="" disabled value="{{ $enquiry->company}}">
                    </div>
                </div>

                <div class="form-group clearfix">
                    <div class="col-md-3">
                        <label>Content</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="" disabled value="{{ $enquiry->content}}">
                    </div>
                </div>

                <div class="col-md-10 col-md-offset-5 clearfix" style="margin-top: 20px">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>