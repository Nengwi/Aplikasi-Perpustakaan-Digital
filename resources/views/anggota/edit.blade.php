<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
            {{ __('Edit Data Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-200">
                
                <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" class="pt-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-6 px-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">NAMA LENGKAP</label>
                            <input type="text" name="nama" value="{{ $anggota->nama }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">NIM / NOMOR IDENTITAS</label>
                            <input type="text" name="nim" value="{{ $anggota->nim }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">NOMOR TELEPON</label>
                            <input type="text" name="nomor_telepon" value="{{ $anggota->nomor_telepon }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 uppercase italic mb-2">ALAMAT LENGKAP</label>
                            <textarea name="alamat" rows="3" 
                                      class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-300 focus:border-blue-500 shadow-sm" 
                                      required>{{ $anggota->alamat }}</textarea>
                        </div>
                    </div>

                    <div class="mt-12 pt-8 border-t flex justify-end space-x-4 px-4">
                        <a href="{{ route('anggota.index') }}" 
                           style="background-color: #dc2626; color: white !important;" 
                           class="inline-flex items-center px-6 py-2 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition shadow-sm">
                            BATAL
                        </a>
                        <button type="submit" 
                                style="background-color: #2563eb; color: white !important;" 
                                class="inline-flex items-center px-6 py-2 rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition shadow-sm">
                            UPDATE DATA ANGGOTA
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>