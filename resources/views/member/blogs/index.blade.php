<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blogs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center space-x-4">
                    <a href="{{route('member.blogs.create')}}">
                        <x-primary-button>Tambah</x-primary-button>
                    </a>
                    <a href="{{route('member.blogs.trash')}}">
                        <x-secondary-button>Tempat Sampah</x-secondary-button>
                    </a>
                </div>
                <div class="flex items-center space-x-2">
                    <form action="{{route('member.blogs.index')}}" method="GET">
                        <input type="text" name="search" class="border border-gray-200 p-2 rounded-md" placeholder="Cari judul blog">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Cari</button>
                    </form>
                    <a href="{{route('member.blogs.index')}}">
                        <x-secondary-button>Reset</x-secondary-button>
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-sm sm-rounded-lg overflow-x-auto">
                <div class="p6 bg-white border-b border-gray-200">
                    <table class="w-full whitespace-no-wrap-full whitespace-no-wrap table-fixed">
                        <thead>
                            <tr class="text-center font-bold">
                                <td class="border px-6 py-4 w-[80px]">No</td>
                                <td class="border px-6 py-4">Judul</td>
                                <td class="border px-6 py-4 lg:w[250px] hidden lg:table-cell">Tanggal</td>
                                <td class="border px-6 py-4 lg:w[100px] hidden lg:table-cell">Status</td>
                                <td class="border px-6 py-4 lg:w[250px]">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key=>$item)
                            <tr>
                                <td class="border px-6 py-4 text-center"> {{$posts->firstItem()+$key}} </td>
                                <td class="border px-6 py-4">
                                    {{ $item->title}}
                                    <div class="block lg:hidden text-sm text-gray-500"> {{$item->status}} | {{$item->created_at->isoFormat('dddd, D MMMM Y')}}</div>
                                </td>
                                <td class="border px-6 py-4 text-center text-gray-500 text-sm hidden lg:table-cell"> {{$item->created_at->isoFormat('dddd, D MMMM Y')}}</td>
                                <td class="border px-6 py-4 text-center text-sm hidden lg:table-cell"> {{$item->status}}</td>
                                <td class="border px-6 py-4 text-center">
                                    <form action=" {{route('member.blogs.destroy',['posts'=>$item->id])}} " class="inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href=" {{route('member.blogs.edit',['posts'=>$item->id])}} " class="text-blue-600 hover:text-blue-400 px-2">edit</a>
                                        <a href="" class="text-gray-600 hover:text-gray-400 px-2">lihat</a>
                                        <button class="text-red-600 hover:text-red-400 px-2" type="submit">hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-5">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>