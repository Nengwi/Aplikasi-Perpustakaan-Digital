<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Buku: ') }} <span class="text-blue-600">{{ $buku->judul }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-2xl p-8 border border-gray-200">
                
                <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT') 
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-lg font-bold text-gray-900 mb-2 uppercase italic">Judul Buku</label>
                            <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" 
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200" required>
                        </div>

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2 uppercase italic">Penulis</label>
                            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" 
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl shadow-sm focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2 uppercase italic">Penerbit</label>
                            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" 
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl shadow-sm focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2 uppercase italic">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" 
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl shadow-sm focus:border-blue-500" required>
                        </div>

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2 uppercase italic">Stok Tersedia</label>
                            <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" 
                                   class="w-full px-4 py-3 border-gray-300 rounded-xl shadow-sm focus:border-blue-500" required>
                        </div>
                    </div>

                    <div class="mt-10 pt-6 border-t flex justify-end space-x-10">
                        <a href="{{ route('buku.index') }}" 
                           style="background-color: #dc2626; color: white !important;" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 shadow-sm transition duration-150">
                            Batal
                        </a>

                        <button type="submit" 
                                style="background-color: #2563eb; color: white !important;" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 shadow-sm transition duration-150">
                            Update Data Buku
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>