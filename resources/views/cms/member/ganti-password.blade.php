<form id="ganti-password-form" action="/manage-member/member/ganti-password" method="POST" enctype="multipart/form-data">
    <div class="modal fade ganti-password" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="ganti-password-title"></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Masukan Password Baru</span>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    const gantiPasswordForm = document.querySelector('#ganti-password-form')

    document.querySelectorAll('[data-target=".ganti-password"]').forEach((item) => {
        item.addEventListener('click', (e) => {
            gantiPasswordForm.querySelector('[name="id"]').value = e.target.getAttribute('data-id')
        })
    })
</script>
