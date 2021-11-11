<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.errors.meta')

    @include('layouts.errors.head')

</head>
<body>

<div id="fb-root"></div>
	@include('layouts.errors.script')
</body>
</html>