{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">Gambar
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image[]" name="image[]">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image[]" name="image[]">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image[]" name="image[]">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image[]" name="image[]">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image[]" name="image[]">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="nama_bank">Nama Barang
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Barang" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="no_rekening">Harga
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="no_rekening">Warna
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="warna" name="warna" placeholder='Warna (["Kuning","Hijau"])' required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="no_rekening">Stok
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="deskripsi-thumbnail">Deskripsi Thumbnail
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" id="deskripsi_tmbnl" name="deskripsi_tmbnl" placeholder="Dekripsi Thumbnail" required cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Dekripsi" required cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>
</div>
