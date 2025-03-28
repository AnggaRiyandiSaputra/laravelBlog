<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Add Data
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Silakan tambahkan data
                            </p>
                        </header>

                        <form method="post" action="{{route('member.blogs.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="title" value="Judul" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                            <div>
                                <x-input-label for="description" value="Deskripsi" />
                                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" required autofocus autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                            <div>
                                <x-input-label for="thumbnail" value="Thumbnail" />
                                <x-text-input id=" thumbnail" name="thumbnail" type="file" class="mt-1 block w-full" :value="old('thumbnail')" autofocus autocomplete="thumbnail" />
                                <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
                            </div>
                            <div>
                                <x-input-label for="content" value="Konten" />
                                <x-textarea-trix value=" {!! old('conten') !!} " id="content" name="content"></x-textarea-trix>
                                <x-input-error class="mt-2" :messages="$errors->get('content')" />
                            </div>
                            <div>
                                <x-select name="status" id="status">
                                    <option value="draft" {{ old('status' ) === 'draft' ? 'selected' : '' }} selected>simpan sebagai draft</option>
                                    <option value="published" {{ old('status' ) === 'published' ? 'selected' : '' }}>Publish</option>
                                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : ''}}>Archived</option>
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