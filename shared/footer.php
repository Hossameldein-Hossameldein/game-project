<!-- Messenger المكون الإضافي "دردشة" Code -->
<div id="fb-root"></div>

<!-- Your المكون الإضافي "دردشة" code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "102003671919467");
  chatbox.setAttribute("attribution", "biz_inbox");

  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v11.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<section class="footer p-4 mt-5">
<div class="container">
<p class="text-white">Copyrights © 2021 <a href="https://www.facebook.com/Hossam.eldein123" target="_blank">Hossam-Eldein</a> All Rights Reserved.</p>
</div>
</section>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
    <script src="assets/fontawesome/all.min.js"></script>
    <script src="page/ajax_js/register.js"></script>
    <script src="page/ajax_js/login.js"></script>
    <script src="page/ajax_js/forget.js"></script>
	<script src="page/ajax_js/checkout.js"></script>
    <script src="assets/splide-slider/splide.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>