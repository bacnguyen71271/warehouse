<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
{{-- Vendor Styles --}}
@yield('vendor-style')
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap-extended.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/colors.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/components.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/dark-layout.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/semi-dark-layout.css')) }}">
{{-- <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script> --}}
{{-- {!! Helper::applClasses() !!} --}}
@php
$configData = Helper::applClasses();
@endphp

{{-- Layout Styles works when don't use customizer --}}

{{-- @if($configData['theme'] == 'dark-layout')
        <link rel="stylesheet" href="{{ asset(mix('css/themes/dark-layout.css')) }}">
@endif
@if($configData['theme'] == 'semi-dark-layout')
<link rel="stylesheet" href="{{ asset(mix('css/themes/semi-dark-layout.css')) }}">
@endif --}}
{{-- Page Styles --}}
@if($configData['mainLayoutType'] === 'horizontal')
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/horizontal-menu.css')) }}">
@endif
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/vertical-menu.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-gradient.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('sass/jquery.toast.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
{{-- Page Styles --}}
@yield('page-style')
{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('css/custom-laravel.css')) }}">
{{-- Custom RTL Styles --}}
@if($configData['direction'] === 'rtl' && isset($configData['direction']))
<link rel="stylesheet" href="{{ asset(mix('css/custom-rtl.css')) }}">
@endif
<style>
.lds-ellipsis {
    display: inline-block;
    position: absolute;
    width: 80px;
    height: 80px;
    top: 50%;
    left: 50%;
}
.lds-ellipsis div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;
  background: #fff;
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.lds-ellipsis div:nth-child(1) {
  left: 8px;
  animation: lds-ellipsis1 0.6s infinite;
}
.lds-ellipsis div:nth-child(2) {
  left: 8px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(3) {
  left: 32px;
  animation: lds-ellipsis2 0.6s infinite;
}
.lds-ellipsis div:nth-child(4) {
  left: 56px;
  animation: lds-ellipsis3 0.6s infinite;
}
@keyframes lds-ellipsis1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes lds-ellipsis3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes lds-ellipsis2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}


.loading {
    width: 100%;
    height: 100%;
    position: fixed;
    display: none;
    z-index: 999999;
    background-color: #0000004d;
}

.jq-toast-single {
    display: block;
    width: 100%;
    padding: 10px;
    margin: 0 0 5px;
    border-radius: 4px;
    font-size: 12px;
    font-family: arial,sans-serif;
    line-height: 17px;
    position: relative;
    pointer-events: all!important;
    background-color: #444;
    color: #fff;
}
</style>
