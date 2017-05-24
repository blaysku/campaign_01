<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Html::script(asset('frontend/js/webfontloader.min.js')) !!}
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    {{-- Bootstrap CSS --}}
    {!! Html::style(asset('frontend/css/bootstrap.css')) !!}
    {{-- Theme Styles CSS --}}
    {!! Html::style(mix('frontend/css/theme.css')) !!}
    {!! Html::style(mix('frontend/css/blocks.css')) !!}
    {!! Html::style(mix('frontend/css/font.css')) !!}
    @stack('styles')
</head>

<body>
    {{-- Fixed Sidebar Left --}}
    @include('frontend._partials.left-sidebar')
    {{-- end Fixed Sidebar Left --}}

    {{-- Fixed Sidebar Left --}}
    @include('frontend._partials.left-sidebar-mobile')
    {{-- end Fixed Sidebar Left --}}

    {{-- Fixed Sidebar Right --}}
    @include('frontend._partials.right-sidebar')
    {{-- end Fixed Sidebar Right --}}

    {{-- Fixed Sidebar Right --}}
    @include('frontend._partials.right-sidebar-mobile')
    {{-- end Fixed Sidebar Right --}}

    {{-- Header --}}
    @include('frontend._partials.header')
    {{-- end Header --}}

    {{-- Responsive Header --}}
    @include('frontend._partials.header-mobile')
    {{-- end Responsive Header --}}

    <div class="header-spacer header-spacer-small"></div>

    {{-- Main content --}}
    @yield('main')
    {{-- end Main content --}}

    {{-- Window-popup-CHAT for responsive min-width: 768px --}}
    @include('frontend._partials.popup-chat')
    {{-- end Window-popup-CHAT for responsive min-width: 768px --}}

    {{-- jQuery, Bootstrap, Vuejs... --}}
    {!! Html::script(mix('frontend/js/app.js')) !!}
    {{-- Js effects for material design. + Tooltips --}}
    {!! Html::script(asset('frontend/js/material.min.js')) !!}
    {{-- Helper scripts (Tabs, Equal height, Scrollbar, etc) --}}
    {!! Html::script(asset('frontend/js/theme-plugins.js')) !!}
    {{-- Init functions --}}
    {!! Html::script(asset('frontend/js/main.js')) !!}
    {{-- Select / Sorting script --}}
    {!! Html::script(asset('frontend/js/selectize.min.js')) !!}
    @stack('scripts')
</body>

</html>
