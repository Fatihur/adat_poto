import Alpine from 'alpinejs';
import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import DataTable from 'datatables.net-dt';
import 'datatables.net-dt/css/dataTables.dataTables.css';

window.Alpine = Alpine;
Alpine.start();

function initQuill() {
    document.querySelectorAll('.quill-editor').forEach(function (el) {
        var inputId = el.dataset.input;
        if (!inputId) return;
        var hiddenInput = document.getElementById(inputId);
        if (!hiddenInput) return;

        var toolbarOptions = [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ['link', 'blockquote'],
            ['clean']
        ];

        var quill = new Quill(el, {
            theme: 'snow',
            modules: { toolbar: toolbarOptions },
            placeholder: 'Tulis konten di sini...',
        });

        if (hiddenInput.value) {
            quill.root.innerHTML = hiddenInput.value;
        }

        var form = el.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                hiddenInput.value = quill.root.innerHTML;
            });
        }
    });
}

var bahasaDataTable = {
    emptyTable: 'Tidak ada data',
    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
    infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data',
    infoFiltered: '(difilter dari _MAX_ total data)',
    infoThousands: '.',
    lengthMenu: 'Tampilkan _MENU_ data',
    loadingRecords: 'Memuat...',
    processing: 'Memproses...',
    search: 'Cari:',
    zeroRecords: 'Data tidak ditemukan',
    paginate: {
        first: 'Pertama',
        last: 'Terakhir',
        next: '›',
        previous: '‹',
    },
    aria: {
        sortAscending: ': aktifkan urutan naik',
        sortDescending: ': aktifkan urutan turun',
    },
};

function initDataTables() {
    document.querySelectorAll('.data-table').forEach(function (table) {
        if (table.dataset.dtInstance) return;
        table.dataset.dtInstance = '1';

        new DataTable(table, {
            language: bahasaDataTable,
            ordering: true,
            pageLength: 10,
            lengthMenu: [10, 25, 50],
            columnDefs: table.dataset.disableOrder
                ? [{ orderable: false, targets: JSON.parse(table.dataset.disableOrder) }]
                : [],
        });
    });
}

function initGaleriFilter() {
    var input = document.getElementById('galeri-search');
    var container = document.getElementById('galeri-grid');
    if (!input || !container) return;

    input.addEventListener('input', function () {
        var keyword = this.value.toLowerCase();
        container.querySelectorAll('.galeri-item').forEach(function (item) {
            var judul = item.dataset.judul?.toLowerCase() || '';
            item.style.display = judul.includes(keyword) ? '' : 'none';
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    initQuill();
    initDataTables();
    initGaleriFilter();
});
