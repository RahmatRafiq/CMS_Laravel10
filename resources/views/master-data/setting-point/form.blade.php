{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="title">Judul
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="title" placeholder="Judul" name="title" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="poin">Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" id="poin" placeholder="Poin" name="poin" required>
            </div>
        </div>
    </div>
</div>
