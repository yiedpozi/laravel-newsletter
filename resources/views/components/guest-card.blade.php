<div class="min-h-screen flex flex-col sm:justify-center items-center py-6 bg-gray-100">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-5xl mt-6 px-6 py-4 bg-white shadow overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>

    <span class="text-gray-400 text-xs text-center uppercase mt-5 block">
        {{ __('Powered by Laravel | Built with love by') }}
        <a class="font-bold text-gray-600 hover:text-gray-800" href="https://yiedpozi.my/" target="_blank">Yied Pozi</a>
    </span>
</div>
