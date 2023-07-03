<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>
    <div class="">
        <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5 mt-3">
            <div class="py-5">
                <a class="bg-red-600 p-3 rounded-lg hover:bg-red-700 text-white font-bold uppercase text-sm"
                    href="{{ url('task') }}">Kembali</a>
            </div>
            @if (Session::has('success'))
                <div class="bg-green-200 px-2 py-0.5 mt-2 rounded-lg">
                    <div class="m-5 text-green-600 font-semibold">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            <div class="mx-50 mt-2 dark:text-white">
                <div class="bg-slate-700 w-full my-5 p-5 rounded-lg">
                    @foreach (App\Models\Surat::all() as $item)
                        <div class="bg-white dark:bg-slate-700 p-4 rounded-lg">
                            <div class="grid grid-cols-2 mb-5">
                                <div class="col-start-1 font-bold text-lg ">{{ $item->judul }}</div>
                                <div class="col-end text-end">
                                    <form class="m-auto" onsubmit="return confirm('Yakin akan menghapus data?')"
                                        action="{{ url('surat/' . $item->id) }}" method="POST">
                                        <a class="underline decoration-amber-500 underline-offset-4 hover:text-amber-500"
                                            href="{{ url('surat/' . $item->id . '/edit') }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="underline decoration-red-500 underline-offset-4 hover:text-red-600 transition-all"
                                            type="submit" name="submit">Delete</button>
                                    </form>
                                </div>
                                <div class="col-end text-md justify-end">Kategori :
                                    {{ $item->kategoris->kategori }}</div>
                            </div>
                            <hr class="my-2">
                            <div class="text-justify">{{ $item->isi }}</div>
                            <div class="text-end">Penerima : {{ $item->penerimas->penerima }}</div>
                            <div class="text-end">Penerima : {{ $item->pengirims->pengirim }}</div>
                        </div>
                        <div class="text-justify">{{ $item->deskripsi }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    </x-layout-app>
