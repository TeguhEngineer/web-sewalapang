@if (session()->has('create'))
    <button id="create" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('create');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('create');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Data berhasil tambahkan!');
                });
            }
        });
    </script>
@endif
@if (session()->has('update'))
    <button id="update" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('update');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('update');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Data berhasil diubah!');
                });
            }
        });
    </script>
@endif
@if (session()->has('delete'))
    <button id="delete" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('delete');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('delete');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Data berhasil dihapus!');
                });
            }
        });
    </script>
@endif
@if (session()->has('upload'))
    <button id="upload" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('upload');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('upload');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Bukti pembayaran berhasil diupload!');
                });
            }
        });
    </script>
@endif
@if (session()->has('batal'))
    <button id="batal" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('batal');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('batal');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Pemesanan lapang berhasil dibatalkan.');
                });
            }
        });
    </script>
@endif
@if (session()->has('sewa'))
    <button id="sewa" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('sewa');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('sewa');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.success('Penyewaan lapang berhasil!');
                });
            }
        });
    </script>
@endif
@if (session()->has('warning'))
    <button id="warning" class="btn btn-primary" hidden></button>
    <script>
        window.onload = function() {
            var button = document.getElementById('warning');
            button.click();
            button.style.display = 'none';
        };

        document.addEventListener('DOMContentLoaded', function() {
            const testToastrButton = document.getElementById('warning');
            if (testToastrButton) {
                testToastrButton.addEventListener('click', function() {
                    toastr.warning('Maaf, lapang ini sedang dipakai orang lain.');
                });
            }
        });
    </script>
@endif

{{-- @if (session('error'))
    <script>
        toastr.error('{{ session('error') }}', 'Maaf, lapang ini sedang dipinjam orang lain', {
            closeButton: true,
            progressBar: true,
            timeOut: 5000
        });
    </script>
@endif

@if (session('info'))
    <script>
        toastr.info('{{ session('info') }}', 'Informasi', {
            closeButton: true,
            progressBar: true,
            timeOut: 4000
        });
    </script>
@endif --}}
