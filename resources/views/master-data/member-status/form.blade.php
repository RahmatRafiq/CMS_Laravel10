{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row" id="input-status-code">
            <label class="col-lg-4 col-form-label" for="status_code">Kode Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input class="form-control" id="status_code" name="status_code" placeholder="Kode Status" type="text"
                    required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status_name">Nama Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="status_name" placeholder="Nama Status" name="status_name"
                    required>
            </div>
        </div>
    </div>
</div>
