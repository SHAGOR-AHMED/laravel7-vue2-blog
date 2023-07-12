<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NewsBlog</title>
    <link href="//fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ mix('css/all.css') }}">
  </head>
  <body>
    <div id="content">
      <!-- header -->
      <header-main></header-main>
      <!-- //header -->
      <div class="w3l-homeblock2 w3l-homeblock5 py-5">
        <div class="container pt-md-4 pb-md-5">
            <!-- Main Body -->
            <public-master></public-master>
        </div>
      </div>

      <!-- footer-28 block -->
      <section class="app-footer">
        <footer-bottom></footer-bottom>
         <button onclick="topFunction()" id="movetop" title="Go to top">
          <span class="fa fa-angle-up"></span>
        </button>
      </section>
    </div>
  </body>
        <script>
          // When the user scrolls down 20px from the top of the document, show the button
          window.onscroll = function () {
            scrollFunction()
          };

          function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("movetop").style.display = "block";
            } else {
              document.getElementById("movetop").style.display = "none";
            }
          }

          // When the user clicks on the button, scroll to the top of the document
          function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
        </script>
        <!-- /move top -->
      </section>
      <!-- //footer-28 block -->
      <!-- disable body scroll which navbar is in active -->
      <script>
        (function () {
          $('.navbar-toggler').click(function () {
            $('body').toggleClass('noscroll');
          })
        });
      </script>
      <!-- disable body scroll which navbar is in active -->
      <!-- Template JavaScript -->
      <script src="{{ asset('site/assets/js/jquery-3.3.1.min.js') }}"></script>
      <script src="{{ mix('js/app2.js') }}"></script>
      <script src="{{ mix('js/all.js') }}"></script>
      
</html>