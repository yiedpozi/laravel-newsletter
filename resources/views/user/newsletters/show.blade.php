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
                    <x-newsletter-display-card id="{{ $newsletter->id }}" />

                    <div class="mt-5 flex">
                        @can('update', $newsletter)
                            <span class="hidden sm:block">
                                <a href="{{ route('user.newsletters.edit', $newsletter->id) }}" class="inline-flex transition items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M2.695 14.763l-1.262 3.154a.5.5 0 00.65.65l3.155-1.262a4 4 0 001.343-.885L17.5 5.5a2.121 2.121 0 00-3-3L3.58 13.42a4 4 0 00-.885 1.343z" />
                                    </svg>
                                    {{ __('Edit') }}
                                </a>
                            </span>
                        @endcan

                        @can('delete', $newsletter)
                            <span class="sm:ml-3">
                                <form method="POST" action="{{ route('user.newsletters.destroy', ['newsletter' => $newsletter->id]) }}">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn-newsletter-delete inline-flex transition items-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                        {{ __('Move to Trash') }}
                                    </button>
                                </form>
                            </span>
                        @endcan

                        @can('restore', $newsletter)
                            <span class="sm:ml-3">
                                <form method="POST" action="{{ route('user.newsletters.restore', ['newsletter' => $newsletter->id]) }}">
                                    @csrf

                                    <button type="submit" class="btn-newsletter-restore inline-flex transition items-center rounded-md border border-transparent bg-yellow-400 px-4 py-2 text-sm font-medium text-black shadow-sm hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-300 focus:ring-offset-2">
                                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M14.78 14.78a.75.75 0 01-1.06 0L6.5 7.56v5.69a.75.75 0 01-1.5 0v-7.5A.75.75 0 015.75 5h7.5a.75.75 0 010 1.5H7.56l7.22 7.22a.75.75 0 010 1.06z" clip-rule="evenodd" />
                                        </svg>

                                        {{ __('Restore') }}
                                    </button>
                                </form>
                            </span>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
