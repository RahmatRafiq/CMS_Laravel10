{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="posisi">Kategori
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select class="form-control" name="kategori_id" id="kategori_id" 
                        onchange="kategoriSelect(this.value)" required>
                        <option value="">-- Kategori --</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->id }}"> {{ $k->name }} </option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="posisi">Sub Kategori
                    <span class="text-danger">*</span>
                </label>
                <div class="col-lg-8">
                    <select name="sub_kategori_id" id="sub_kategori_id" class="form-control" required>
                        <option value="">-- Sub Kategori --</option>
                    </select>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="description" placeholder="Produk" name="description" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Harga
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="price" placeholder="Harga" name="price" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Kode Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="kode_produk" placeholder="Kode Produk" name="kode_produk" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Stok
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="stok" id="stok" required>
                    <option value="">-- Stok --</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Tidak">Tidak Tersedia</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Otomatis
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="otomatis" id="otomatis" required>
                    <option value="">-- Otomatis --</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Notes
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" id="notes" name="notes" placeholder="Notes" required cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="poin" placeholder="Poin" name="poin" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Nama perusahaan
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="perusahan" placeholder="Nama Perusahaan" name="perusahaan" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image_produk">Gambar Produk
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image_produk" name="image_produk">
            </div>
        </div>
    </div>
</div>