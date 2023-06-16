<script src="/assets/js/highlight.min.js"></script>
<script src="/assets/js/alpine-collaspe.min.js"></script>
<script src="/assets/js/alpine-persist.min.js"></script>
<script defer src="/assets/js/alpine-ui.min.js"></script>
<script defer src="/assets/js/alpine-focus.min.js"></script>
<script defer src="/assets/js/alpine.min.js"></script>
<script src="/assets/js/custom.js"></script>
<script src="/assets/js/simple-datatables.js"></script>
<script>
  document.addEventListener('alpine:init', () => {

      Alpine.data('header')

      // main section
      Alpine.data('scrollToTop', () => ({
          showTopButton: false,
          init() {
              window.onscroll = () => {
                  this.scrollFunction();
              };
          },

          scrollFunction() {
              if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                  this.showTopButton = true;
              } else {
                  this.showTopButton = false;
              }
          },

          goToTop() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
          },
      }));

      // theme customization
      Alpine.data('customizer', () => ({
          showCustomizer: false,
      }));

      // sidebar section
      Alpine.data('sidebar', () => ({
          init() {
              const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
              if (selector) {
                  selector.classList.add('active');
                  const ul = selector.closest('ul.sub-menu');
                  if (ul) {
                      let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                      if (ele) {
                          ele = ele[0];
                          setTimeout(() => {
                              ele.click();
                          });
                      }
                  }
              }
          },
      }));
  });
</script>