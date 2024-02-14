{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="judul">Username
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input class="form-control" id="username" name="username" placeholder="Username" type="text" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Email
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Nama Lengkap
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" required>
            </div>
        </div>
        <div class="form-group row" id="input-password">
            <label class="col-lg-4 col-form-label" for="posisi">Password
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Jenis Kelamin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="gender" id="gender" required>
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Verifikasi Member
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="verifikasi" id="verifikasi" required>
                    <option value="">-- Verifikasi --</option>
                    <option value="0">Belum Terverifikasi</option>
                    <option value="1">Terverifikasi</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Alamat
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea name="address" id="address" cols="30" rows="10" class="form-control" placeholder="Alamat" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">No Telp
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="No Telp" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Saldo
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="saldo" id="saldo" placeholder="Saldo" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Poin
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="poin" id="poin" placeholder="Point" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Status Member
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <select class="form-control" name="status_member" id="status_member" required>
                    <option value="">-- Status Member --</option>
                    <option value="reguler">Regular</option>
                    <option value="premium">Premium</option>
                    <option value="gold">Gold</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Jumlah PIN
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="total_masukan_pin" id="total_masukan_pin" placeholder="Total Masukan PIN" required/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Kode Referral
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" readonly id="kode_referral" placeholder="Kode Referral"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Upline
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" readonly id="id_atas" placeholder="id_atas"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Token Notif
                <span class="text-danger"></span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" readonly id="token_notif" placeholder="token_notif"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">PIN
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="pin" id="pin" placeholder="PIN" required/>
            </div>
        </div>
    </div>
</div>