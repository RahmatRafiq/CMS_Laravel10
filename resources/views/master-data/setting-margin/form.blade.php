{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="range_start">Rentang Mulai
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="range_start" placeholder="Rentang Mulai"
                    name="range_start" required>
            </div>
        </div>
        <div class="form-group row" id="input-total">
            <label class="col-lg-4 col-form-label" for="range_end">Rentang Akhir
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="range_end" placeholder="Rentang Akhir" name="range_end">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="margin">Margin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="margin" placeholder="Margin" name="margin">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="member_type">Tipe Member
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="member_type" id="member_type" required>
                    <option value="">-- Tipe Member --</option>
                    <option value="reguler">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="gold">Gold</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="status">Status
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="status" id="status" required>
                    <option value="">-- Status --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>

    </div>
</div>
