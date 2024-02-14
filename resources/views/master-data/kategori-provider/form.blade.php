{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Kategori
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="kategori_id" id="kategori_id" required>
                    <option value="">-- Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"> {{ $k->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Provider
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="provider_id" id="provider_id" required>
                    <option value="">-- Provider ID --</option>
                    @foreach ($provider as $p)
                        <option value="{{ $p->id }}"> {{ $p->nama }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
