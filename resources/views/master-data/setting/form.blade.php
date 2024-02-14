{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="title">Judul
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="title" placeholder="Judul" name="title" required>
            </div>
        </div>
        <div class="form-group row" id="input-total">
            <label class="col-lg-4 col-form-label" for="total">Total
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="total" placeholder="Total" name="total">
            </div>
        </div>
        <div class="form-group row" id="syaratdanketentuanregister">
            <label class="col-lg-4 col-form-label" for="syaratdanketentuanregister">Syarat Dan Ketentuan Register
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea name="totalsdk" id="totalsdk" cols="30" rows="10" class="form-control"
                    placeholder="Syarat Dan Ketentuan Register"></textarea>
            </div>
        </div>

    </div>
</div>
