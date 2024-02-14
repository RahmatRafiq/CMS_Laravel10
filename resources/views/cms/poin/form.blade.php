{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="member_id">Member
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="member_id" id="member_id">
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="poin">Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="poin" name="poin" placeholder="Poin" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="poin_akhir">Poin Akhir
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="poin_akhir" name="poin_akhir" placeholder="Poin Akhir"
                    required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="produk">Produk
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select name="produk" id="produk">
                    <option>Produk</option>
                    @foreach ($produk as $p)
                        <option value="{{ $p->id }}">{{ $p->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="type_poin">Type Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select name="type_poin" id="type_poin">
                    <option>Pilih Type Poin</option>
                    @foreach ($type_poin as $tp)
                        <option value="{{ $tp }}">{{ $tp }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label " for="type">Type
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select name="type" id="type">
                    <option>Pilih Type</option>
                    @foreach ($type as $t)
                        <option value="{{ $t }}">{{ Str::ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    // const selectElement = document.querySelector('#member_id')
    $('#member_id').select2({
        placeholder: "Isi 3 kata untuk mencari",
        allowClear: true,
        ajax: {
            url: "/poin/members",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                console.log(data);
                return {
                    results: data?.map(item => {
                        return {
                            id: item.id,
                            text: `${item.username} - ${item.email}`
                        }
                    })
                };
            },
            cache: true
        }
    })
</script>
