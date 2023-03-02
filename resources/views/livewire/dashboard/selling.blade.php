<div>
    <div class="mb-2">
        <label for="barcode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">بارکد محصول</label>
        <input type="text" id="barcode" autofocus class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400" dir="rtl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        نام محصول
                    </th>
                    <th scope="col" class="px-6 py-3">
                        بارکد
                    </th>
                    <th scope="col" class="px-6 py-3">
                        قیمت
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ساعت خرید
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sells as $sell)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $sell->product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $sell->product->barcode }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $sell->product->price }} تومان
                        </td>
                        <td class="px-6 py-4">
                            {{ jdate($sell->created_at) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById("barcode").addEventListener('change', () => {
            let barcode = document.getElementById("barcode").value;
            Livewire.emit('create', barcode);
            document.getElementById("barcode").value = "";
        });
    </script>
</div>
