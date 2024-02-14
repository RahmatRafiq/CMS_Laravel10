{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="judul">Judul
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input class="form-control" id="judul" tabindex="-98" name="judul" placeholder="Judul" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Posisi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="posisi" tabindex="-98" placeholder="Posisi" name="posisi" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Posisi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" id="deskripsi" tabindex="-98" name="deskripsi" placeholder="Deskripsi" required cols="30" rows="4"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status">Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" id="status" tabindex="-98" name="status" id="status" required>
                    <option value="aktif">Aktif</option>
                    <option value="tidak aktif">Tidak Aktif</option>    
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="halaman">Halaman <span
                class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" tabindex="-98" name="halaman" id="halaman" required>
                    <option value="utama mobile slide">Utama Mobile Slide</option>
                    <option value="popup awal">Popup Awal</option>    
                </select>
            </div>
        </div>
        <div class="form-group row" id="form-gambar">
            <label class="col-lg-4 col-form-label" for="gambar">Gambar 
            </label>
            <div class="col-lg-8">
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="gambar" id="gambar" placeholder="Pilih gambar (*.jpg)" accept=".jpg"/>
                      <label class="custom-file-label col-form-label" for="gambar" id="placeholder-input-gambar">Pilih gambar (*.jpg)</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>