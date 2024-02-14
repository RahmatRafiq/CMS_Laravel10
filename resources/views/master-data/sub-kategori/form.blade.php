{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Kategori
                <span class="text-danger">*</span>
            </label>
            <div class="col">
                <select class="form-control" name="kategori_id" id="kategori_id" required>
                    <option value="">-- Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}"> {{ $k->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Name
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-4">
                <label class="form-label" for="posisi">Server
                    <span class="text-danger">*</span>
                </label>
            </div>
            <div class="col">
                <select class="form-control" name="server1" id="server" required>
                    <option value="">-- Server --</option>
                    @foreach ($server as $s)
                        <option value="{{ $s->server }}"> {{ $s->server}} </option>
                    @endforeach
                </select>
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
