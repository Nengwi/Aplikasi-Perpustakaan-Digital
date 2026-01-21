<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight text-center">
            {{ __('Tambah Koleksi Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-200">

                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <!-- JUDUL -->
                        <div class="md:col-span-2 px-6">
                            <label class="block text-lg font-bold text-gray-900 mb-5 text-center">
                                JUDUL BUKU
                            </label>
                            <input type="text" name="judul" placeholder="Masukkan judul buku"
                                class="w-full px-5 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-300"
                                required>
                        </div>

                        <!-- PENULIS -->
                        <div class="px-6">
                            <label class="block text-lg font-bold text-gray-900 mb-3 text-center">
                                PENULIS
                            </label>
                            <input type="text" name="penulis" placeholder="Nama penulis"
                                class="w-full px-5 py-3 border border-gray-300 rounded-xl" required>
                        </div>

                        <!-- PENERBIT -->
                        <div class="px-6">
                            <label class="block text-lg font-bold text-gray-900 mb-3 text-center">
                                PENERBIT
                            </label>
                            <input type="text" name="penerbit" placeholder="Nama penerbit"
                                class="w-full px-5 py-3 border border-gray-300 rounded-xl" required>
                        </div>

                        <!-- TAHUN TERBIT -->
                        <div class="px-6">
                            <label class="block text-lg font-bold text-gray-900 mb-3 text-center">
                                TAHUN TERBIT
                            </label>
                            <input type="number" name="tahun_terbit" placeholder="2024"
                                class="w-full px-5 py-3 border border-gray-300 rounded-xl" required>
                        </div>

                        <!-- STOK -->
                        <div class="px-6">
                            <label class="block text-lg font-bold text-gray-900 mb-3 text-center">
                                STOK TERSEDIA
                            </label>
                            <input type="number" name="stok" placeholder="0"
                                class="w-full px-5 py-3 border border-gray-300 rounded-xl" required>
                        </div>
                    </div>

                    <!-- TOMBOL -->
                    <div class="mt-10 pt-6 border-t flex justify-end space-x-10">

                        <a href="{{ route('buku.index') }}" style="background-color: #dc2626; color: white !important;"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                            Batal
                        </a>

                        <button type="submit" style="background-color: #2563eb; color: white !important;"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                            Simpan Data Buku
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
