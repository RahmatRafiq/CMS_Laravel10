<form id="tambah-saldo-form" action="/manage-member/member/tambah-saldo" method="POST" enctype="multipart/form-data">
    <div class="modal fade tambah-saldo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @csrf
                {{-- member id --}}
                <input type="hidden" name="id" id="id">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah-saldo-title">Tambah Saldo Member</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Masukan Jumlah Saldo</span>
                    <input type="number" class="form-control" id="saldo" placeholder="Saldo" name="saldo" required>
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
    const tambahSaldoForm = document.querySelector('#tambah-saldo-form')

    document.querySelectorAll('[data-target=".tambah-saldo"]').forEach((item) => {
        item.addEventListener('click', (e) => {
            console.log(e.target.getAttribute('data-id'))
            tambahSaldoForm.querySelector('[name="id"]').value = e.currentTarget.getAttribute('data-id')
        })
    })
</script>
