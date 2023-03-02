<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/toast.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/css/style.css') }}">

    @livewireStyles
</head>
<body class="bg-gray-100 relative bg-[url('{{ asset('./assets/images/Sprinkle.svg') }}')]" x-data="{Menu:false}">
{{ $slot }}

<script src="{{ asset('./assets/js/alpine.js') }}" defer></script>
<script src="{{ asset('./assets/js/toast.js') }}"></script>
<script src="{{ asset('./assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('./assets/js/flowbit.js') }}"></script>
<script>
    window.addEventListener('toast',event => {
        new Notify({
            status: event.detail.status,
            title: event.detail.title,
            text: event.detail.text,
            effect: 'fade',
            speed: 300,
            customClass: '',
            customIcon: '',
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 3,
            position: 'left bottom',
            customWrapper: '',
        });
    });

    window.addEventListener('swal_confirm',event => {
        Swal.fire({
            title: event.detail.title,
            showCancelButton: true,
            confirmButtonText: 'تایید',
            cancelButtonText: 'لغو',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(event.detail.function, event.detail.id)
            }
        })
    });

    window.addEventListener('swal_update',event => {
        Swal.fire({
            input: 'text',
            inputValue: event.detail.value,
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'ثبت',
            cancelButtonText: 'لغو',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit(event.detail.function, result.value,event.detail.id);
            }
        })
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
