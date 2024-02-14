{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="price_sale">Harga Promo
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="price_sale" id="price_sale" placeholder="Harga Promo"
                    required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="date_sale">Tanggal Selesai
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="date" class="form-control" name="date_sale" id="date_sale" placeholder="Tanggal Selesai"
                    required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="time_sale">Jam Selesai
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="time" class="form-control" name="time_sale" id="time_sale" placeholder="Jam Selesai"
                    required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="kuota_transaksi">Kuota Transaksi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="kuota_transaksi" placeholder="Kuota Transaksi"
                    name="kuota_transaksi" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="total_transaksi">Total Transaksi
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="total_transaksi" id="total_transaksi"
                    placeholder="Total Transaksi" required />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="is_active">Is Active
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="is_active" id="is_active" required>
                    <option value="">-- Is Active --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non Aktif</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="type">Type
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="type" id="type" required>
                    <option value="">-- Type --</option>
                    <option value="1">Dengan ID</option>
                    <option value="0">Tanpa ID</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="produk_id">Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="produk_id" id="produk_id" required>
                    <option value="">-- Produk --</option>
                    @foreach ($produk as $item)
                        <option value="{{ $item->id }}">{{ $item->description }} - {{ $item->stok }}
                            - {{ $item->price }}</option>
                    @endforeach
                </select>
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
    </div>
</div>
