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
    @livewireStyles
</head>

<body class="bg-green-950">

    @include('partials.navbar')
    @include('partials.sidebar')
    @yield('content')

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            // Handler untuk tombol "Tambah Entri"
            $("#tambah-entri").click(function() {
                // Duplicat elemen form terakhir
                var lastForm = $("#form");
                var clonedForm = lastForm.clone();

                // Kosongkan nilai input dan select pada elemen duplikat
                clonedForm.find('#nama_sampel').val('');
                // clonedForm.find('select').val('');

                // Sisipkan elemen duplikat setelah elemen terakhir
                clonedForm.insertAfter(lastForm);
            });

            // Handler untuk tombol "Hapus Entri"
            $(document).on("click", "#hapus-entri", function() {
                // Cek jumlah total entri form
                var totalForm = $("#form").length;

                // Hanya menghapus entri form jika lebih dari satu form tersisa
                if (totalForm >= 1) {
                    // Hapus elemen form terkait
                    $(this).closest('#form').remove();
                }
            });
        });
    </script> --}}
    @livewireScripts
</body>

</html>
