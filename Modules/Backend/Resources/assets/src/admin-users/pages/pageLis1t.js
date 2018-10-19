import React from 'react';
import ReactDOM from 'react-dom';
import ReactTable from 'react-table';

import csrf from 'app/common/csrf-token';

function makeData(){
    let data = [];
    for(let i=0; i<50; i++ ){
        data.push({
            firstName:'first_' +i ,
            lastName: 'last_' + i,
            age: i,
            phone: '1804914' + i,
            math: i*10,
            location: '陕西省西安市',
            description: '测试内容测试内容测试内容测试内容测试内容测试内容测试内容'
        });
    }
    return data;
}

class App extends React.Component
{
    constructor(){
        super();
        this.state = {
            data: makeData(),
            pages: 5,
            loading: false,
        };
    }
    render(){
        const { data, pages, loading } = this.state;

        return (
            <div className="box">
                <div className="box-header with-border">
                    <div className="pull-left">
                        <a className="btn btn-sm btn-primary grid-refresh">
                            <i className="fa fa-refresh"></i> {{__('Refresh')}}
                        </a>
                        <a className="btn btn-sm btn-dropbox btn-filter">
                            <i className="fa fa-filter"></i> {{__('Filter')}}
                        </a>
                    </div>
                    <div className="pull-right">
                        <div className="btn-group pull-right" style="margin-right:10px">
                            <a href="{{ \Backend::baseUrl('/admin-users/create') }}" className="btn btn-sm btn-success">
                                <i className="fa fa-plus"></i>&nbsp;&nbsp;{{__('New')}}
                            </a>
                        </div>
                    </div>
                </div>

                <TableFilter />

                <div className="box-body table-responsive">
                    <ReactTable
                        data={data}
                        loading={loading}
                        onFetchData={this.fetchData.bind(this)}
                        manual
                        pages={pages}
                        filterable
                        defaultFilterMethod={(filter, row) => {
                            console.log(filter, row)
                            return String(row[filter.id]).startsWith(filter.value)
                        }}
                        columns={[
                            {Header: 'First Name', accessor: 'firstName',
                                filterMethod: (filter, row) => {
                                    return row[filter.id].startsWith(filter.value) && row[filter.id].endsWith(filter.value);
                                }
                            },
                            {Header: 'Last Name', accessor: 'lastName'},
                            {Header: 'Age', accessor:'age'},
                            {Header: 'Phone', accessor:'phone'},
                            {Header: 'Math', accessor:'math'},
                            {Header: 'Location', accessor:'location'},
                            {Header: 'Description', accessor:'description'},
                            {Header: 'Actions', accessor: 'id', width: 110, Filter: ()=>'',
                                Cell: row => (
                                    <div className="btn-group" href={row['lastName']}>
                                        <a className="btn btn-sm btn-success">
                                            <i className="fa fa-eye"></i>
                                        </a>
                                        <a className="btn btn-sm btn-info">
                                            <i className="fa fa-edit"></i>
                                        </a>
                                        <button className="btn btn-sm btn-danger">
                                            <i className="fa fa-trash"></i>
                                        </button>
                                    </div>
                                )
                            },
                        ]}
                        defaultPageSize={10}
                        className="-striped -highlight"
                    />
                </div>
            </div>
        );
    }
    fetchData(state, instance){
        console.log('fetch', state, instance)
        this.setState({loading: false})
    }
}



export function pageLis1t(){
    ReactDOM.render(<App/>, document.getElementById('box_container'));
}




export function pageList1(){
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
