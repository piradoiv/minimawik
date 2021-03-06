
  <div id="footer">
    <div class="row">
      <div class="seven columns">
        <h3><a href="/">MinimaWik</a></h3>
        Proudly made by Pirado IV for 
        <a href="http://www.mediavida.com/foro/dev/website-dare-v-the-hangover-478997" target="_blank">
          Website Dare V
        </a>
        <p>
          <a href="#" class="btnEditPage">Edit this page!</a>
        </p>
      </div>

      <div class="five columns">
        <h4>Recently changed pages</h4>
        <ul>
        <?php foreach ($recent_pages as $page): ?>
          <li>
            <a href="<?= $page->slug ?>">
              <?= $page->title ?>
            </a>
          </li>
        <?php endforeach ?>
        </ul>
      </div>
      
    </div>
  </div>

  <!-- Grab Google CDN's jQuery, fall back to local if offline -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.9.1.min.js"><\/script>')</script>

  <!--
  Include gumby.js followed by UI modules.
  Or concatenate and minify into a single file
  <script src="js/libs/ui/gumby.retina.js"></script>
  <script src="js/libs/ui/gumby.skiplink.js"></script>
  <script src="js/libs/ui/gumby.toggleswitch.js"></script>
  <script src="js/libs/ui/gumby.checkbox.js"></script>
  <script src="js/libs/ui/gumby.radiobtn.js"></script>
  <script src="js/libs/ui/gumby.tabs.js"></script>
  <script src="js/libs/ui/jquery.validation.js"></script>
  <script src="js/libs/gumby.init.js"></script>
  -->
  <script src="js/libs/gumby.js"></script>
  <script src="js/libs/ui/gumby.fixed.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="js/libs/gumby.init.js"></script>
  
  <script src="/js/showdown.min.js"></script>
  <script src="http://rawgithub.com/ajaxorg/ace-builds/master/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
  <script src="/js/main.js"></script>

  <!-- Change UA-XXXXX-X to be your site's ID -->
  <!--<script>
    window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
    Modernizr.load({
      load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
    });
  </script>-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

  </body>
</html>