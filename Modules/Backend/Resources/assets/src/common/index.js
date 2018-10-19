
import { pagerGoto } from './pager-togo';
import './language';

import './style.scss';
window.g = window.g || {};



g.tableDefaultOptions = {
    paging: true,
    processing: true,
    serverSide: true,
    order: [[ 1, 'asc' ]],
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    dom: '<"row"<"col-sm-6"B><"col-sm-6"f>>'
        + '<"row"<"col-sm-12"rt>>'
        + '<"row"<"col-sm-7 table_info_w"il><"col-sm-5 table-pager-w"p<"pager-goto-w">>>',
    buttons: ['csv', 'excel', 'print']
};

//search
g.applySearch = function($table, $search, $columnSearch){
    function searchCallback(e){
        if(e.keyCode === 13){
            $table.search($search.val());
            //console.log(t.column($s.parent().index()))
            $columnSearch.each(function(i, n){
                var $s = $(n);
                $table.column($s.attr('name') + ':name').search($s.val());
            });
            $table.draw();
        }
    }
    $search.off().on('keyup', searchCallback);
    $columnSearch.on('keyup',searchCallback);
};



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
    $.widget.bridge('uibutton', $.ui.button);
    pagerGoto();
}
