<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AdministrasiGuru') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- link toastr --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
        <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased">


        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('scripts')

        @livewireScripts
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        {{-- confirm  --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


        <script>
            // sweet alert success
            window.addEventListener('toastr:info', event => {
                toastr.info(event.detail.message);
            });

            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
                }
                });

            window.addEventListener('swal:modal', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type
                });
            });

            window.addEventListener('swal:error', event => {

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda belum memiliki mata pelajaran..',
                    }).then( empty =>{
                        if(empty){
                            window.livewire.emit('showEmpySubject');
                        }
                    })
            });

            // sweet alert delete data classroom
            window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: false,
                })
                .then( will_delete => {
                    if(will_delete){
                        window.livewire.emit('deleteClassroom', event.detail.id);
                    }else{
                        swal("Data masih ada..");
                    }
                })
            });


            // eventListener confirm delete mata pelajaran
            window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: false,
                })
                .then( will_delete => {
                    if(will_delete){
                        window.livewire.emit('deleteSubject', event.detail.id);
                    }else{
                        swal("Data Mata Pelajaran masih ada..");
                    }
                })
            });

            // event listener info delete subject
            window.addEventListener('subjectDeleted', event => {
                swal(
                    'Deleted!',
                    'Data deleted successfully',
                    'success'
                )
            });

            // event Listener delete classroom
            window.addEventListener('swal:confirm', event => {
                swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                    buttons: true,
                    dangerMode: false,
                })
                .then( will_delete => {
                    if(will_delete){
                        window.livewire.emit('deleteClassroom', event.detail.id);
                    }else{
                        swal("Data masih ada..");
                    }
                })
            });

            // event listener info delete classroom
            window.addEventListener('classroomDeleted', event => {
                swal(
                    'Deleted!',
                    'Data Berhasil Dihapus..',
                    'success'
                )
            });

        </script>


    </body>
</html>
