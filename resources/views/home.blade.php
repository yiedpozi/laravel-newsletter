<x-guest-layout>
    <x-guest-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div id="newsletters">
            @if ($newsletters->count() > 0)
                @foreach ($newsletters as $newsletter)
                    <x-newsletter-guest-card id="{{ $newsletter->id }}" />
                @endforeach
            @else
                <span id="newsletters-empty-text" class="font-semibold text-sm text-blue-700">{{ __('No newsletter yet!') }}</span>
            @endif
        </div>
    </x-guest-card>

    <script type="module">
        const Echo = window.Echo;

        let newsletterChannel = Echo.channel('newsletter');

        newsletterChannel.listen('.NewsletterCreated', function(newsletter) {
            prependNewsletter(newsletter);
            checkNewsletters();
        });

        newsletterChannel.listen('.NewsletterTrashed', function(newsletter) {
            $('#newsletters #newsletter-'+newsletter.id).fadeOut('normal', function() {
                $(this).remove();
                checkNewsletters();
            });
        });

        newsletterChannel.listen('.NewsletterRestored', function(newsletter) {
            prependNewsletter(newsletter);
            sortNewsletters();
            checkNewsletters();
        });

        function prependNewsletter(newsletter) {
            // refer resources/views/components/newsletter-guest-card.blade.php
            var html = '<div id="newsletter-'+newsletter.id+'" class="border-b border-slate-100 pb-5 mb-5 lg:flex lg:items-center lg:justify-between">'+
                            '<div class="min-w-0 flex-1">'+
                                '<h2 class="text-xl font-bold leading-7 text-gray-900 sm:truncate sm:text-2xl sm:tracking-tight">'+newsletter.title+'</h2>'+

                                '<div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">'+
                                    '<div class="mt-2 flex items-center text-sm text-gray-500">'+
                                        '<svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">'+
                                            '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z" clip-rule="evenodd" />'+
                                        '</svg>'+
                                        newsletter.user+
                                    '</div>'+
                                    '<div class="mt-2 flex items-center text-sm text-gray-500">'+
                                        '<svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">'+
                                            '<path fill-rule="evenodd" d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z" clip-rule="evenodd" />'+
                                        '</svg>'+

                                        '<span title="'+moment(newsletter.created_at).format('dddd, MMMM D, YYYY [at] h:mm A')+'">'+moment(newsletter.created_at).fromNow()+'</span>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="text-gray-700 mt-3">'+newsletter.content+'</div>'+
                            '</div>'+
                        '</div>';

            $(html).hide().prependTo("#newsletters").fadeIn();

            $('#newsletters-empty-text').remove();
        }

        // Sort newsletters by ID (descending order)
        function sortNewsletters() {
            $("#newsletters > div").sort(function(a, b) {
                var firstId  = a.id.split('-').pop();
                var secondId = b.id.split('-').pop();

                return parseInt(secondId) - parseInt(firstId);
            }).each(function() {
                var elem = $(this);
                elem.remove();
                $(elem).appendTo("#newsletters");
            });
        }

        // Check if has newsletters
        function checkNewsletters() {
            var newsletters = $('#newsletters');

            if (!$.trim(newsletters.html())) {
                newsletters.html('<span id="newsletters-empty-text" class="font-semibold text-sm text-blue-700">{{ __('No newsletter yet!') }}</span>');
            }
        }
    </script>
</x-guest-layout>
