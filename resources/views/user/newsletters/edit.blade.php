<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Newsletters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4 class="font-semibold text-lg mb-5">{{ __('Edit Newsletter - :title', ['title' => $newsletter->title]) }}</h4>

                    <form method="POST" action="{{ route('user.newsletters.update', ['newsletter' => $newsletter->id]) }}">
                        @csrf
                        @method('put')

                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __( 'Title' ) }}</label>
                            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 transition" value="{{ old('title', $newsletter->title) }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900">{{ __( 'Content' ) }}</label>
                            <textarea id="content" name="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 transition" rows="4" required>{{ old('content', $newsletter->content) }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex transition items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>

                            {{ __('Save Changes') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
