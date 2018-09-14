
import './style.scss';

function sidebarClick(){
    $('.sidebar-menu li:not(.treeview) > a').on('click', function(){
        var $s = $(this);
        var $parent = $s.parent().addClass('active');
        $parent.siblings('.treeview.active').find('> a').trigger('click');
        $parent.siblings().removeClass('active').find('li').removeClass('active');
        $s.parents('.main-sidebar').find('.sidebar-menu>li').removeClass('active');
    });
}
function sidebarInitActive(){
    var $s = $('a[href="'+ g.menuUri +'"]');
    $s.parent().siblings().removeClass('active');
    $s.parent().addClass('active');
    $s.parents('.treeview').addClass('active')
}


$.fn.editable.defaults.params = function (params) {
    params._token = LA.token;
    params._editable = 1;
    params._method = 'PUT';
    return params;
};

toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000
};

export function common(){
    window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

    let token = document.head.querySelector('meta[name="csrf-token"]');

    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }

    sidebarInitActive();
    sidebarClick();

    $('[data-toggle="popover"]').popover();
}