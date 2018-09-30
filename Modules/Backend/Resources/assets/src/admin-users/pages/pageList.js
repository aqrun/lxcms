import csrf from 'app/common/csrf-token';

export function pageList(){
    let headers = {};
    headers[csrf.name] = csrf.token;
    let ajax = {
        url: g.baseUrl + 'admin-users/index-data',
        type: 'POST',
        headers: headers,
        data: function(d){
            return d;
        }
    };
    let columns = [
        {data: 'id', name:'id',
            orderable:true, searchable: true},
        {data: 'avatar', name:'avatar',
            orderable:false, searchable: false, render:(data, type, row) => {
                return '<div style="display: flex;align-content: center;justify-content: center;align-items: center;">'
                    +'<img src="'+ data +'" style="max-width:30px"/></div>'
            }},
        {data: 'username', name: 'username',
            render: function(data, type, row){return data;}},
        {data: 'name', name: 'name',
            render: function(data, type, row){return data;}},
        {data: 'email', name:'email'},
        {data:'weight', name:'weight', orderable:true, searchable:false},
        {data:'status', name:'status', orderable:false, searchable:true},
        {data:'created_str', name:'created_at', orderable:true, searchable:false},
        {data:'updated_str', name:'updated_at', orderable:true, searchable:false},
        {
            data: 'id',name:'',
            orderable: false,
            width:'80px',
            render: function(data, type, row){
                return (new EJS({element:'tpl_action'})).render({id:data});
            }
        }
    ];

    window.t = $('.table').DataTable(Object.assign({}, g.tableDefaultOptions, {
        ajax: ajax, columns: columns,
        order:[[7,'desc']]
    }));

    g.applySearch(t, $('.dataTables_filter input'), $('.th_search_w input'));
    $('body').delegate('.btn_delete','click',  function(e){
        e.preventDefault();
        var $s = $(this);
        window.openDeleteModal('确定删除?', function(e){
            $('#react_container .modal').remove();
        }, function(e){
            var url = $s.attr('href');
            var id = $s.data('id');
            var postData = {id:id};
            postData[g.csrfParam] = g.csrfToken;
            $.post(url, postData, function(data){
                $('#react_container .modal').remove();
                t.draw();
            }).fail(function(error){
                $('#react_container .modal').remove();
                $.gritter.add({
                    title: error.statusText,
                    text: error.responseText,
                    class_name: 'gritter-warning'
                });
            })
        });
    })
}
