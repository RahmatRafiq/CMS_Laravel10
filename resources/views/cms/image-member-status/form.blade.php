{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="id_produk_member_status">Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="id_produk_member_status" id="id_produk_member_status" required>
                    <option value="">-- Produk --</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->id . '-' . $item->memberstatus->status_name . '-' . $item->produk->description }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status">Is Active
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="status" id="status" required>
                    <option value="">-- Is Active --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="gambar">Gambar
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="file" class="form-control" id="gambar" placeholder="Gambar" name="gambar">
            </div>
        </div>
    </div>
</div>
