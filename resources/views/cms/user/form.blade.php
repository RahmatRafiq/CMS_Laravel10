{{ csrf_field() }}
<input type="hidden" id="id" name="id">
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="judul">Username
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input class="form-control" id="name" name="name" placeholder="Username" type="text" required>
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
            <label class="col-lg-4 col-form-label" for="posisi">Phone
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-4 col-form-label" for="posisi">Address
                <span class="text-danger">*</span>
            </label>
            <div class="col-lg-8">
                <textarea class="form-control" name="address" placeholder="Address" id="address" cols="20" rows="10" required></textarea>
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
    </div>
</div>