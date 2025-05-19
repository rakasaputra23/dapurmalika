<!-- Order Modal -->
<div x-show="orderModalOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div x-show="orderModalOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Modal content -->
        <div x-show="orderModalOpen"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Order <span x-text="currentMenu.nama"></span>
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pembeli</label>
                        <input x-model="customerName" type="text"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <div class="flex items-center">
                            <button @click="quantity > 1 ? quantity-- : quantity"
                                class="px-3 py-1 bg-gray-100 border border-gray-300 rounded-l-md">
                                -
                            </button>
                            <input x-model="quantity" type="number" min="1" readonly
                                class="w-16 px-3 py-1 text-center border-t border-b border-gray-300">
                            <button @click="quantity++"
                                class="px-3 py-1 bg-gray-100 border border-gray-300 rounded-r-md">
                                +
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Catatan (Opsional)</label>
                        <textarea x-model="specialNotes" rows="3"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-amber-500 focus:border-amber-500"></textarea>
                    </div>

                    <div class="bg-gray-50 p-3 rounded-md">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-500">Harga:</span>
                            <span class="text-gray-900">Rp<span x-text="formatPrice(currentMenu.price)"></span></span>
                        </div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-500">Jumlah Pesanan:</span>
                            <span class="text-gray-900" x-text="quantity"></span>
                        </div>
                        <div class="border-t border-gray-200 mt-2 pt-2 flex justify-between">
                            <span class="font-medium text-gray-900">Total:</span>
                            <span class="font-medium text-amber-600">Rp<span x-text="formatPrice(quantity * currentMenu.price)"></span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <a :href="generateWhatsAppLink()" target="_blank"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-amber-600 text-base font-medium text-white hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Pesan Sekarang
                </a>
                <button @click="orderModalOpen = false" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>