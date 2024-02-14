{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="nama">Nama Provider
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Provider" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="image">Gambar
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="image" name="image">
            </div>
        </div>
    </div>
</div>
