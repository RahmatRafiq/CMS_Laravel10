<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<script>
    function getImage(data, type, full, meta) {
        return `

        `;
    }

    // moment().locale('in')
    const table = $('#example50').DataTable({
        order: [
            [0, 'desc']
        ],
        ajax: {
            url: '/transaksi-realtime/new-data',
            dataSrc: ''
        },
        columns: [{
                data: 'updated_at', render: (data) => {
                    return moment(data).format('YYYY-MM-DD HH:mm:ss')
                }
            },
            {
                data: 'produk_description'
            },
            {
                data: 'phone'
            },
            {
                data: 'username'
            },
            {
                data: 'nama_lengkap'
            },
            {
                data: 'status_pengisian'
            },
            {
                data: 'status_pengisian',
                name: 'opsi',
                render: (data) => {
                    return `
                    <span
                        class="badge light ${data == 'Menunggu Pembayaran'
                            ? 'badge-warning'
                            : (data == 'Pengisian'
                                ? 'badge-info'
                                : (data == 'Berhasil'
                                    ? 'badge-success'
                                    : (data == 'Refund'
                                        ? 'badge-important'
                                        : 'badge-danger'))) }">
                        <i
                            class="fa fa-circle ${data == 'Menunggu Pembayaran'
                                ? 'text-warning'
                                : (data == 'Pengisian'
                                    ? 'text-info'
                                    : (data == 'Berhasil'
                                        ? 'text-success'
                                        : (data == 'Refund'
                                            ? 'text-important'
                                            : 'text-danger'))) } mr-1"></i>
                        ${data}
                    </span>
                    `
                }
            },
            {
                data: 'saldo'
            }
        ]
    })

    // Pusher.logToConsole = true;

    var pusher = new Pusher('f49d453f79483a94cd2a', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('create_transaksi');
    channel.bind('transaksi_baru', function(data) {
        table.ajax.reload()
    });
</script>
