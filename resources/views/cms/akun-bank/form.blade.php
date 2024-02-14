{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="judul">Nama Bank
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input class="form-control" id="nama_bank" name="nama_bank" placeholder="Nama Bank" type="text" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Nomer Rekening
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="no_rekening" placeholder="No Rekening" name="no_rekening" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Atas Nama
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="atas_nama" placeholder="Atas Nama" name="atas_nama" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Image
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image" placeholder="Image" name="image">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status">QRIS
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" id="qris" name="qris" id="qris" required>
                    <option value="">Status QRIS</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>
    </div>
</div>
