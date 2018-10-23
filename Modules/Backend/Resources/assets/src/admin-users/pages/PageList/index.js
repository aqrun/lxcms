import React from 'react';
import ReactDOM from 'react-dom';

import {
    TableHeader,
    TableFilter,
    TableContent,
} from './components';
import { initLanguage, __ } from 'app/common/language';
import query from 'app/utils/query';

import csrf from 'app/common/csrf-token';
import {generateEnUS, generateZhCN } from 'app/admin-users/languages';
import './style.scss';

class App extends React.Component
{
    constructor(){
        super();
        this.state = {
            data: [],
            pages: 0,

            loading: false,
            filters: [],
            showFilterBox: false,
        };
    }
    render(){
        const { data, pages, loading, showFilterBox } = this.state;

        return (
            <div className="box">
                <TableHeader
                    btnFilterClickHandle={this.btnFilterClickHandle.bind(this)}
                />
                <TableFilter show={showFilterBox}/>
                <TableContent
                    data={data}
                    pages={pages}
                    loading={loading}
                    fetchData={this.fetchData.bind(this)}
                />
            </div>
        );
    }
    fetchData(state, instance){
        console.log('fetch', state, instance)
        this.setState({loading: true});
        let url = g.baseUrl + 'admin-users/index-data';
        let body = {
            page: state.page,
            pageSize: state.pageSize,
            sorted: state.sorted,
            filtered: state.filtered,
        };
        let headers = {};
        headers[csrf.name] = csrf.token;

        query.post(url, {
            headers: headers,
            body:JSON.stringify(body)
        }).then(data=>{
            this.setState({
                pages:data.pages,
                data: data.data,
                loading: false,
            })
        }).catch(err=>{
            this.setState({loading: false});
            console.log(err);
        })
    }
    btnFilterClickHandle(e){
        e.preventDefault();
        this.setState({showFilterBox: !this.state.showFilterBox})
    }
}

export function PageList(){
    initLanguage({
        'en-US': generateEnUS(),
        'zh-CN': generateZhCN(),
    });
    ReactDOM.render(<App/>, document.getElementById('box_container'));
}
