<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/i18n/i18n.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/spinkit/spinkit.css')) }}">

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/block-ui/block-ui.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/sortablejs/sortable.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/chartjs/chartjs.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/apex-charts/apexcharts.js')) }}"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/7.2.0/intro.min.js" integrity="sha512-MCM74PPZwlAz3VdPGg3cQn4Jb83jO2Q3LGika//u7H+hyk0HfyraT0u0gVf4jB44xJj3WwbGxn45L7frballmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<script src="{{ asset(mix('assets/js/cards-actions.js')) }}"></script>
<!-- END: Page JS-->
@stack('modals')
@livewireScripts
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
