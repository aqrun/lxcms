webpackJsonp([0],[,,,,function(e,a,t){"use strict";function n(){void 0!==g.page_admin_users_list&&g.page_admin_users_list&&Object(r.a)()}Object.defineProperty(a,"__esModule",{value:!0}),a.init=n;var r=t(5)},function(e,a,n){"use strict";function r(){var e={};e[d.a.name]=d.a.token;var a={url:g.baseUrl+"admin-users/index-data",type:"POST",headers:e,data:function(e){return e}},n=[{data:"id",name:"id",orderable:!0,searchable:!0},{data:"avatar",name:"avatar",orderable:!1,searchable:!1,render:function(e,a,t){return'<div style="display: flex;align-content: center;justify-content: center;align-items: center;"><img src="'+e+'" style="max-width:30px"/></div>'}},{data:"username",name:"username",render:function(e,a,t){return e}},{data:"name",name:"name",render:function(e,a,t){return e}},{data:"email",name:"email"},{data:"weight",name:"weight",orderable:!0,searchable:!1},{data:"status",name:"status",orderable:!1,searchable:!0},{data:"created_str",name:"created_at",orderable:!0,searchable:!1},{data:"updated_str",name:"updated_at",orderable:!0,searchable:!1},{data:"id",name:"",orderable:!1,width:"80px",render:function(e,a,t){return new EJS({element:"tpl_action"}).render({id:e})}}];window.t=$(".table").DataTable(Object.assign({},g.tableDefaultOptions,{ajax:a,columns:n,order:[[7,"desc"]]})),g.applySearch(t,$(".dataTables_filter input"),$(".th_search_w input")),$("body").delegate(".btn_delete","click",function(e){e.preventDefault();var a=$(this);window.openDeleteModal("确定删除?",function(e){$("#react_container .modal").remove()},function(e){var n=a.attr("href"),r=a.data("id"),d={id:r};d[g.csrfParam]=g.csrfToken,$.post(n,d,function(e){$("#react_container .modal").remove(),t.draw()}).fail(function(e){$("#react_container .modal").remove(),$.gritter.add({title:e.statusText,text:e.responseText,class_name:"gritter-warning"})})})})}a.a=r;var d=n(6)},function(e,a,t){"use strict";var n=document.head.querySelector('meta[name="csrf-token"]'),r="";n&&(r=n.content);var d={name:"X-CSRF-TOKEN",token:r};a.a=d}]);