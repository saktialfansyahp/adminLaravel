<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Data Ebook - Admin') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <form action="{{ route('posts.store') }}" method="POST" >
                    @csrf
                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Judul</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="judul"
                        placeholder="Enter judul">
                    @error('judul') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>

                <div class="mb-4">
                    <div class="form-group">
                        <strong>Cover/Gambar :</strong>
                         <input type="file" name="cover" class="form-control" placeholder="cover: format png,jpg">
                        @error('cover')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                       @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Tahun Terbit</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="terbit"
                        placeholder="Enter terbit">
                    @error('terbit') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Kategori 1</label>
                    <select class="form-control" name="kategori_1">
                        <option disabled selected>Pilih Kategori</option>
                        <option value="rekomendasi">rekomendasi</option>
                        <option value="terbaru">terbaru</option>
                        <option value="populer">populer</option>
                        <option value="terlaris">terlaris</option>
                        <option value="gratis">gratis</option>
                    </select>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Kategori 2</label>
                        <select class="form-control" name="kategori_2">
                            <option disabled selected>Pilih Kategori</option>
                            <option value="beauty">beauty</option>
                            <option value="healt">healt</option>
                            <option value="social science">social science</option>
                            <option value="religion & spirituality">religion & spirituality</option>
                            <option value="education & teaching">education & teaching</option>
                            <option value="entertainment">entertainment</option>
                            <option value="parenting & family">parenting & family</option>
                        </select>
                    </div>

                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Rating</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="rating"
                        placeholder="Enter rating">
                    @error('rating') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>

                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Deskripsi</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="deskripsi"
                        placeholder="Enter deskripsi">
                    @error('deskripsi') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>

                <div class="mb-4">
                    <div class="form-group">
                        <strong>Isi :</strong>
                         <input type="file" name="isi" class="form-control" placeholder="isi format: pdf">
                        @error('isi')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                       @enderror
                    </div>
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
