<div x-data="{CreateProductModal:false,UpdateProductModal:false}" x-on:closemodalupdateproduct="UpdateProductModal = false">

    <div>
        <button type="button" @click="CreateProductModal = true" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">افزودن محصول جدید +</button>
    </div>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400" dir="rtl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    نام محصول
                </th>
                <th scope="col" class="px-6 py-3">
                    قیمت
                </th>
                <th scope="col" class="px-6 py-3">
                    تعداد
                </th>
                <th scope="col" class="px-6 py-3">
                    بارکد
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->count }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->barcode }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <div>
                                    <button type="button" wire:click="confirm_delete({{ $product->id }})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">حذف</button>
                                </div>
                                <div class="mr-2">
                                    <button type="button" @click="UpdateProductModal = true" wire:click="set_update_value({{ $product->id }})" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">ویرایش</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div x-show="CreateProductModal" x-transition class="w-screen h-screen bg-black bg-opacity-70 fixed top-0 left-0 flex z-50 justify-center items-center p-2">
        <div class="w-full md:w-1/2 max-h-full overflow-y-auto bg-white rounded p-2 flex flex-col">
            <div class="h-14 w-full flex flex-row-reverse p-2">
                <div>
                    <button type="button" @click="CreateProductModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="max-h-96 overflow-y-auto flex flex-col p-2">

                <form wire:submit.prevent="create">
                    <div class="mb-6">
                        <label for="barcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره بارکد محصول</label>
                        <input type="text" id="barcode" wire:model="barcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام محصول</label>
                        <input type="text" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">قیمت محصول</label>
                        <input type="text" id="price" wire:model="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تعداد محصول</label>
                        <input type="text" id="count" wire:model="count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">افزودن محصول</button>
                </form>

            </div>
            <div class="h-14 p-2 w-full flex">
                <div>
                    <button type="button" @click="CreateProductModal = false" class="py-2 px-3 rounded-lg bg-red-700 text-white">بستن</button>
                </div>
            </div>
        </div>
    </div>
    <div x-show="UpdateProductModal" x-transition class="w-screen h-screen bg-black bg-opacity-70 fixed top-0 left-0 flex z-50 justify-center items-center p-2">
        <div class="w-full md:w-1/2 max-h-full overflow-y-auto bg-white rounded p-2 flex flex-col">
            <div class="h-14 w-full flex flex-row-reverse p-2">
                <div>
                    <button type="button" @click="UpdateProductModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="max-h-96 overflow-y-auto flex flex-col p-2">

                <form wire:submit.prevent="update">
                    <div class="mb-6">
                        <label for="barcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره بارکد محصول</label>
                        <input type="text" id="barcode" wire:model="barcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام محصول</label>
                        <input type="text" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">قیمت محصول</label>
                        <input type="text" id="price" wire:model="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div class="mb-6">
                        <label for="count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">تعداد محصول</label>
                        <input type="text" id="count" wire:model="count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ویرایش محصول</button>
                </form>

            </div>
            <div class="h-14 p-2 w-full flex">
                <div>
                    <button type="button" @click="UpdateProductModal = false" class="py-2 px-3 rounded-lg bg-red-700 text-white">بستن</button>
                </div>
            </div>
        </div>
    </div>
</div>
