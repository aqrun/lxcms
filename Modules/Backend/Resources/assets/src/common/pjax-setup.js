export default function pjax_setup(){
    $.pjax.defaults.timeout = 5000;
    $.pjax.defaults.maxCacheLength = 0;

    $(document).pjax('a:not(a[target="_blank"],a[no-pjax])', {
        container: '#pjax-container'
    });

    NProgress.configure({ parent: 'body' });

    $(document).on('pjax:timeout', function(event) { event.preventDefault(); })

    $(document).on('submit', 'form[pjax-container]', function(event) {
        $.pjax.submit(event, '#pjax-container')
    });

    $(document).on("pjax:popstate", function() {

        $(document).one("pjax:end", function(event) {
            $(event.target).find("script[data-exec-on-popstate]").each(function() {
                $.globalEval(this.text || this.textContent || this.innerHTML || '');
            });
        });
    });

    $(document).on('pjax:send', function(xhr) {
        if(xhr.relatedTarget && xhr.relatedTarget.tagName && xhr.relatedTarget.tagName.toLowerCase() === 'form') {
            var $submit_btn = $('form[pjax-container] :submit');
            if($submit_btn) {
                $submit_btn.button('loading')
            }
        }
        NProgress.start();
    });

    $(document).on('pjax:complete', function(xhr) {
        if(xhr.relatedTarget && xhr.relatedTarget.tagName && xhr.relatedTarget.tagName.toLowerCase() === 'form') {
            var $submit_btn = $('form[pjax-container] :submit');
            if($submit_btn) {
                $submit_btn.button('reset')
            }
        }
        NProgress.done();
    });
}