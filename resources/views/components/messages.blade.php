@if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 border border-green-200 rounded-lg" role="alert">
        {!! session('success') !!}
    </div>
@endif

@if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 border border-red-200 rounded-lg" role="alert">
        @foreach ($errors->all() as $error)
            {!! $error !!}<br>
        @endforeach
    </div>
@endif
