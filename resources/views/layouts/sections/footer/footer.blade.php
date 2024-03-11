<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }} d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      © <script>
        document.write(new Date().getFullYear())

      </script>
      , made with ❤️ by <a href="{{ (!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '') }}" target="_blank" class="footer-link fw-semibold">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
    </div>
    <div>
      <a href="{{ config('variables.contactUs') ? config('variables.contactUs') : '#' }}" target="_blank" class="footer-link me-4">Contact Us</a>
     | {{ now()->format('Y-m-d H:i:s') }}
    </div>
  </div>
</footer>
<script>
  $("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 5 secs

});
</script>
<!--/ Footer-->
