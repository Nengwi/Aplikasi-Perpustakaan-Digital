<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Tambah Koleksi Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200">
                
                <form action="{{ route('buku.store') }}" method="POST" class="pt-6">
                    @csrf
                    
                    <div class="space-y-6 px-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">JUDUL BUKU</label>
                            <input type="text" name="judul" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   placeholder="Masukkan judul buku" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">PENULIS</label>
                            <input type="text" name="penulis" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   placeholder="Nama penulis" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">PENERBIT</label>
                            <input type="text" name="penerbit" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   placeholder="Nama penerbit" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">TAHUN TERBIT</label>
                            <input type="number" name="tahun_terbit" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   placeholder="Contoh: 2024" required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">STOK TERSEDIA</label>
                            <input type="number" name="stok" 
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   placeholder="0" required>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t flex justify-end space-x-4 px-4">
                        <a href="{{ route('buku.index') }}" 
                           style="background-color: #dc2626; color: white !important;" 
                           class="inline-flex items-center px-6 py-2 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition shadow-sm">
                            BATAL
                        </a>
                        <button type="submit" 
                                style="background-color: #2563eb; color: white !important;" 
                                class="inline-flex items-center px-6 py-2 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition shadow-sm">
                            SIMPAN DATA BUKU
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>