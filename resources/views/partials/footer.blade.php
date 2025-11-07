<footer class="bg-dark text-white mt-4 py-4">
  <div class="container d-flex justify-content-between align-items-center">
    <div>
      <h5>FoodFusion</h5>
      <small>Promoting home cooking & culinary creativity.</small>
      <p class="mt-2 mb-0">
        <a href="#" class="text-white me-2">Privacy</a>
        <a href="#" class="text-white">Cookie</a>
      </p>
    </div>
    <div class="text-end">
      <div>Follow us</div>
      <div>
        <a href="#" class="text-white me-2">Facebook</a>
        <a href="#" class="text-white me-2">Instagram</a>
        <a href="#" class="text-white">YouTube</a>
      </div>
    </div>
  </div>

  @if(!request()->cookie('ff_cookies_accepted'))
    <div class="cookie-bar bg-light text-dark p-3">
      <div class="container d-flex justify-content-between align-items-center">
        <div>We use cookies to improve your experience. By using this site you accept our cookie policy.</div>
        <form method="POST" action="{{ route('cookie.accept') }}">@csrf<button class="btn btn-success">Accept</button></form>
      </div>
    </div>
  @endif
</footer>
