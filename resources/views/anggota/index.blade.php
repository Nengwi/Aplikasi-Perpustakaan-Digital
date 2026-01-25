<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-base text-gray-800 leading-tight uppercase tracking-wide">
                {{ __('Daftar Anggota Perpustakaan') }}
            </h2>
            <a href="{{ route('anggota.create') }}" style="background-color: #2563eb; color: white !important;"
                class="px-5 py-2 rounded-lg font-bold text-xs uppercase tracking-widest shadow-md hover:bg-blue-700 transition">
                + TAMBAH ANGGOTA BARU
            </a>
        </div>
    </x-slot>

    <div class="mt-4"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm border border-gray-300 sm:rounded-lg">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200 border-b-2 border-gray-300">
                            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">NAMA LENGKAP</th>
                            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">NIM/ID</th>
                            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">ALAMAT</th>
                            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">NO. TELEPON</th>
                            <th class="px-6 py-4 text-center text-xs font-black text-gray-700 uppercase border border-gray-300">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggotas as $anggota)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 text-sm font-bold text-gray-900 border border-gray-300 text-center uppercase">
                                {{ $anggota->nama }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 border border-gray-300 text-center">
                                {{ $anggota->nim }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 border border-gray-300 text-center italic">
                                {{ $anggota->alamat }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 border border-gray-300 text-center">
                                {{ $anggota->nomor_telepon }}
                            </td>
                            <td class="px-6 py-4 text-center text-sm border border-gray-300">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('anggota.edit', $anggota->id) }}" class="text-gray-900 hover:text-blue-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-gray-900 hover:text-red-600">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>