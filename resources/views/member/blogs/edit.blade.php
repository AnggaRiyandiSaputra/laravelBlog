<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Edit Data
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan melakukan perubahan data
                            </p>
                        </header>

                        <form method="post" action="{{route('member.blogs.update',['posts'=>$blog->id])}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <input type="hidden" name="id" id="" value="{{$blog->id}}">
                            <div>
                                <x-input-label for="title" value="Judul" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $blog->title)" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div>
                                <x-input-label for="description" value="Deskripsi" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $blog->description)" required autofocus autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div>
                                <x-input-label for="thumbnail" value="Thumbnail" />
                                @isset($blog->thumbnail)
                                <img src="{{asset('storage/thumbnails/'.$blog->thumbnail)}}" alt="thumbnail" class="rounded-md border-gray-300 max-w-40 p-2>
                                @endisset
                                <x-text-input id=" thumbnail" name="thumbnail" type="file" class="mt-1 block w-full" :value="old('thumbnail', $blog->thumbnail)" autofocus autocomplete="thumbnail" />
                                <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                            </div>
                            <div>
                                <x-input-label for="content" value="Konten" />
                                <x-textarea-trix value=" {!! old('conten',$blog->content) !!} " id="content" name="content"></x-textarea-trix>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>
                            <div>
                                <x-select name="status" id="status">
                                    <option value="draft" {{ old('status',$blog->status ) === 'draft' ? 'selected' : '' }}>simpan sebagai draft</option>
                                    <option value="published" {{ old('status',$blog->status ) === 'published' ? 'selected' : '' }}>Publish</option>
                                    <option value="archived" {{ old('status',$blog->status) === 'archived' ? 'selected' : ''}}>Archived</option>
                                </x-select>
                            </div>
                            <div class="flex items-center gap-4">
                                <a href="{{route('member.blogs.index')}}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>Simpan</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>