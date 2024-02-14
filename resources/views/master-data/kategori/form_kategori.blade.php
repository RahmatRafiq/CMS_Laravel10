{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="kategori">Kategori
        <span class="text-danger">*</span>
    </label>
    <div class="col-lg-7">
        <input type="text" class="form-control" id="name" name="name" placeholder="Kategori" required>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="val-view-pelanggan">Status
        <span class="text-danger">*</span>
    </label>
    <div class="col-lg-7">
        <div class="form-group mb-0">
            <label class="radio-inline mr-3"><input type="radio" id="view_pelanggan_id_1" name="view_pelanggan_id" value="1"> Active</label>
            <label class="radio-inline mr-3"><input type="radio" id="view_pelanggan_id_2" name="view_pelanggan_id" value="0"> Non Active</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="val-password">Image
    </label>
    <div class="col-lg-7">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" multiple accept='image/*' required>
            <label class="custom-file-label" id="file-upload-filename">Choose file</label>
        </div>
    </div>
</div>
