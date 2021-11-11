<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.partials.meta')

    @include('layouts.partials.head')

</head>
<body>

<div id="fb-root"></div>
	@include('layouts.partials.script')
</body>
</html>