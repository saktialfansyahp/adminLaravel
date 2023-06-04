<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Ebook') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-4 py-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-green-600 border border-transparent rounded-md hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-gray disabled:opacity-25">
                    <- Go back
                </a>
                <table class="w-full table-fixed">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 font-bold">Judul</td>
                            <td>{{ $post->judul }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Cover</td>
                            <td>{{ $post->cover }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Tahun Terbit</td>
                            <td>{{ $post->terbit }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Kategori 1</td>
                            <td>{{ $post->kategori_1 }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Kategori 2</td>
                            <td>{{ $post->kategori_2 }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Rating</td>
                            <td>{{ $post->rating }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Jenis</td>
                            <td>{{ $post->jenis }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Penulis</td>
                            <td>{{ $post->penulis }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Deskripsi</td>
                            <td>{{ $post->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Isi</td>
                            <td>{{ $post->isi }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Created on</td>
                            <td>{{ date_format($post->created_at, 'jS F Y g:i A') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Last updated</td>
                            <td>{{ date_format($post->updated_at, 'jS F Y g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
