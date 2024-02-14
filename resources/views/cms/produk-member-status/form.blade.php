{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="day_active">Hari Aktif
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="day_active" id="day_active" placeholder="Hari Aktif"
                    required />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="id_member_status">Member Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="id_member_status" id="id_member_status" required>
                    <option value="">-- Member Status --</option>
                    @foreach ($memberstatus as $item)
                        <option value="{{ $item->id }}">{{ $item->status_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status">Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-7">
                <div class="form-group mb-0">
                    <label class="radio-inline mr-3"><input type="radio" id="status" name="status" value="0">
                        Active</label>
                    <label class="radio-inline mr-3"><input type="radio" id="status" name="status" value="1">
                        Non Active</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="id_produk">Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="id_produk" id="id_produk" required>
                    <option value="">-- Produk --</option>
                    @foreach ($produk as $item)
                        @if ($item->subkategori->kategori->name == 'Lisensi')
                            <option value="{{ $item->id }}">{{ $item->subkategori->kategori->name }} -
                                {{ $item->stok }} - {{ $item->price }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
