<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Lab KIMIA - Institut Teknologi Surabaya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link rel="icon" href="/img/logo.png">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    @livewireStyles
</head>

<body class="bg-green-950">
    {{-- <div class="w-full flex min-h-screen items-center justify-center bg-green-950"> --}}
    {{-- <div class="relative bg-green-950">
    </div> --}}
    @include('sweetalert::alert')
    @include('partials.navbar')
    @include('partials.sidebar')
    @yield('content')

    @livewireScripts

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            $('.btn-confirm').click(function(event) {
                var transactionId = $(this).data('transaction-id');

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: 'Status transaksi akan diperbarui',
                    type: 'warning',
                    position: 'center',
                    icon: 'info',
                    showCloseButton: true,
                    showDenyButton: true,
                    confirmButtonColor: '#F5B12C',
                    cancelButtonColor: '#e8392f',
                    confirmButtonText: 'Terima Transaksi',
                    denyButtonText: 'Tolak Transaksi',
                    focusConfirm: false,
                    focusCancal: false,
                    returnFocus: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'transaksi/terima/' + transactionId,
                            method: 'post',
                            success: function(response) {
                                location.reload(200);
                                window.location.href = 'admin/transaksi';
                            }
                        })
                    } else if (result.isDenied) {
                        $.ajax({
                            url: 'transaksi/tolak/' + transactionId,
                            method: 'put',
                            success: function(response) {
                                window.location.href = 'transaksi';
                                swalWithBootstrapButtons.fire(
                                    'Ditolak!',
                                    'Status Transaksi Berhasil Ditolak',
                                    'error'
                                )
                            }
                        })
                    }
                })
            });
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            $(document).on("click", "#tambah-entri", function() {
                var lastForm = $("#form");
                var clonedForm = lastForm.clone();

                clonedForm.find('#nama_sampel').val('');
                clonedForm.find('#jadwal').val('');

                clonedForm.insertAfter(lastForm);
            });

            $(document).on("click", "#hapus-entri", function() {
                var totalForm = $("#form").length;

                if (totalForm >= 1) {
                    $(this).closest('#form').remove();
                } else {
                    $(this).prop('disabled', true);
                    // $(document).on('click')
                    // $(this).closest('#form').remove();
                }
            });
        });
    </script> --}}
</body>

</html>
