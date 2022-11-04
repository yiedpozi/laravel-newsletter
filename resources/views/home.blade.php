<x-guest-layout>
    <x-guest-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        @foreach ($newsletters as $newsletter)
            <x-newsletter-display-card id="{{ $newsletter->id }}" />
            <hr class="border-slate-100 my-5">
        @endforeach
    </x-guest-card>
</x-guest-layout>
