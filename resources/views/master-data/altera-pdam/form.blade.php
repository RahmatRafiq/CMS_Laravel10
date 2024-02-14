{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="code">Kode
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="code" placeholder="Kode" name="code" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="description">Deskripsi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Deskripsi"
                    required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Admin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="admin" id="admin" placeholder="Biaya Admin"
                    required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="poin" id="poin" placeholder="Poin" required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="produk_notes">Catatan Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea name="produk_notes" id="produk_notes" cols="30" rows="10" class="form-control"
                    placeholder="Catatan Produk" required></textarea>
            </div>
        </div>
    </div>
</div>
