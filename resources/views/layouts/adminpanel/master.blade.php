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
<div class="flex flex-row-reverse text-right relative">
    <!-- side menu -->
    <div x-bind:class="Menu ? '' : 'hidden'"  @click="Menu = false" class="absolute z-50 w-screen h-screen bg-black bg-opacity-60"></div>
    <div x-bind:class="Menu ? '' : 'hidden'" x-transition class="w-64 h-screen md:block fixed top-0 right-0 bg-slate-800 z-50 border-l-2 p-4 flex flex-col">
        <div>
            <button type="button" @click="Menu = false" x-bind:class="Menu ? '' : 'hidden'" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset('./assets/images/profile.png') }}" class="md:w-1/2" alt="">
        </div>
        <div class="text-center flex justify-center items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="text-white">
                <h1>{{ auth()->user()->name }}</h1>
            </div>
        </div>
        <div class="flex justify-center mt-2">
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 hover:text-gray-600 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </a>
            <a href="{{ route('logout') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 hover:text-gray-600 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
            </a>
        </div>
{{--        <div class="mt-4">--}}
{{--            <form action="" method="get">--}}
{{--                <input type="text" name="" id="" class="outline-none rounded-lg w-full h-9 p-2 text-gray-400 focus:ring-2 ring-offset-2 transition-all focus:ring-sky-500" dir="rtl" placeholder="جست و جو....">--}}
{{--            </form>--}}
{{--        </div>--}}
        <hr class="my-4">

{{--        <div x-data="{is_open:false}" class="mb-3">--}}
{{--            <template x-if="is_open">--}}
{{--                <button type="button" @click="is_open = false" x-bind:class="is_open ? 'bg-gray-500' : ''" class="w-full text-white flex justify-between items-center text-right hover:bg-gray-500 py-2 px-1 rounded transition-all">--}}
{{--                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>--}}
{{--                    فروشگاه--}}
{{--                </button>--}}
{{--            </template>--}}
{{--            <template x-if="is_open == false">--}}
{{--                <button type="button" @click="is_open = true" x-bind:class="is_open ? 'bg-gray-500' : ''" class="w-full text-white flex justify-between items-center text-right hover:bg-gray-500 py-2 px-1 rounded transition-all">--}}
{{--                    <svg class="w-4 h-4 ml-2 rotate-90" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>--}}
{{--                    فروشگاه--}}
{{--                </button>--}}
{{--            </template>--}}
{{--            <div x-show="is_open" x-transition class="w-full flex-col space-y-2 mt-1 rounded p-1">--}}
{{--                <div class="hover:bg-gray-500 p-1 rounded transition-all"><a href="{{ route('products.admin.dash') }}" class="w-full  text-white text-right py-2 px-1 rounded transition-all">محصولات</a></div>--}}
{{--                <div class="hover:bg-gray-500 p-1 rounded transition-all"><a href="{{ route('categories.admin.dash') }}" class="w-full  text-white text-right py-2 px-1 rounded transition-all">دسته بندی ها</a></div>--}}
{{--                <div class="hover:bg-gray-500 p-1 rounded transition-all"><a href="{{ route('labels.admin.dash') }}" class="w-full  text-white text-right py-2 px-1 rounded transition-all">برچسب ها</a></div>--}}
{{--                <div class="hover:bg-gray-500 p-1 rounded transition-all"><a href="{{ route('bills.admin.dash') }}" class="w-full  text-white text-right py-2 px-1 rounded transition-all">سفارش ها</a></div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <button type="button" class="w-full text-white flex flex-row-reverse justify-between items-center text-right hover:bg-gray-500 py-2 px-1 rounded transition-all">
            <a href="{{ route('dashboard.index') }}">میزکار</a>
        </button>
        <button type="button" class="w-full text-white flex flex-row-reverse justify-between items-center text-right hover:bg-gray-500 py-2 px-1 rounded transition-all">
            <a href="{{ route('dashboard.products') }}">محصولات</a>
        </button>
        <button type="button" class="w-full text-white flex flex-row-reverse justify-between items-center text-right hover:bg-gray-500 py-2 px-1 rounded transition-all">
            <a href="{{ route('dashboard.selling') }}">سیستم فروش</a>
        </button>

    </div>
    <!-- main content -->
    <div class="w-screen h-screen md:pr-64">
        <div class="flex flex-col p-2">
            <!-- top bar -->
            <div class="flex flex-row-reverse justify-between">
                <div class="flex flex-row-reverse items-center">
                    <div>
                        <button type="button" @click="Menu = true" class="md:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                    </div>
                    <div class="mr-3 md:mr-0 flex flex-row-reverse items-center">
                        <div>
                            <img src="{{ asset('./assets/images/logo.png') }}" class="w-72">
                        </div>
                        <div>
                            <h1 class="text-sm">(دبیرستان پسرانه دوره دوم)</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content -->
            <div class="flex flex-col">
                <div class="mt-5">
                    <h1 class="text-lg font-bold border-r-4 border-sky-500 pr-2 rounded">@yield('title')</h1>
                </div>
                <div class="bg-gray-200 rounded-lg p-2 flex flex-col mt-3">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('./assets/js/alpine.js') }}" defer></script>
<script src="{{ asset('./assets/js/toast.js') }}"></script>
<script src="{{ asset('./assets/js/sweetalert.js') }}"></script>
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
<script src="{{ asset('./assets/js/flowbit.js') }}"></script>
@livewireScripts
</body>
</html>
