<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Ebook - Admin') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back </a>
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="textjudul" class="block mb-2 text-sm font-bold text-gray-700">Judul</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="judul" value="{{ $post->judul }}" placeholder="Enter judul">
                                @error('judul')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="textcover" class="block mb-2 text-sm font-bold text-gray-700">Cover</label>
                                <input type="file" name="cover" id="cover" accept="image/*"
                                    class="form-control">
                                @error('cover')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="textterbit" class="block mb-2 text-sm font-bold text-gray-700">Tahun
                                    Terbit</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="terbit" value="{{ $post->terbit }}" placeholder="Enter terbit">
                                @error('terbit')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="textkategori_1" class="block mb-2 text-sm font-bold text-gray-700">Kategori
                                    1</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="kategori_1" value="{{ $post->kategori_1 }}" placeholder="Enter kategori_1">
                                @error('kategori_1')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="textkategori_2" class="block mb-2 text-sm font-bold text-gray-700">Kategori
                                    2</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="kategori_2" value="{{ $post->kategori_2 }}" placeholder="Enter kategori_2">
                                @error('kategori_2')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="textrating"
                                    class="block mb-2 text-sm font-bold text-gray-700">Rating</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="rating" value="{{ $post->rating }}" placeholder="Enter rating">
                                @error('rating')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label for="textname" class="block mb-2 text-sm font-bold text-gray-700">Jenis Ebook
                                    </label>
                                <select class="form-control" name="jenis">
                                    <option disabled selected>Pilih Jenis Ebook</option>
                                    <option value="biasa">biasa</option>
                                    <option value="premium">premium</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="textname"
                                    class="block mb-2 text-sm font-bold text-gray-700">Penulis</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="penulis" placeholder="Enter penulis">
                                @error('penulis')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="textdeskripsi"
                                    class="block mb-2 text-sm font-bold text-gray-700">Deskripsi</label>
                                <input type="text"
                                    class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    name="deskripsi" value="{{ $post->deskripsi }}" placeholder="Enter deskripsi">
                                @error('deskripsi')
                                    <span class="text-red-500">{{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="textisi" class="block mb-2 text-sm font-bold text-gray-700">Isi</label>
                                <input type="file" name="isi" id="isi" accept="application/pdf"
                                    class="form-control">
                                @error('isi')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 my-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                    Save
                                </button>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</x-app-layout>
