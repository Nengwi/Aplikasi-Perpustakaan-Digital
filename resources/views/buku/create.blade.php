<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Tambah Buku </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block">Judul</label>
                    <input type="text" name="judul" class="w-full border-gray-300 rounded shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label class="block">Penulis</label>
                    <input type="text" name="penulis" class="w-full border-gray-300 rounded shadow-sm" required>
                </div>
                <div class="mb-4 flex gap-4">
                    <div class="w-1/2">
                        <label class="block">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="w-full border-gray-300 rounded shadow-sm" required>
                    </div>
                    <div class="w-1/2">
                        <label class="block">Stok</label>
                        <input type="number" name="stok" class="w-full border-gray-300 rounded shadow-sm" required>
                    </div>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('buku.index') }}" class="ml-2 text-gray-600">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>