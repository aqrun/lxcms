import React from 'react';
import ReactDOM from 'react-dom';

import {
    TableHeader,
    TableFilter,
    TableContent,
} from './components';

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
            filters: [],
        };
    }
    render(){
        const { data, pages, loading } = this.state;

        return (
            <div className="box">
                <TableHeader />
                <TableFilter />
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
        this.setState({loading: false})
    }
}

export function pageList(){
    ReactDOM.render(<App/>, document.getElementById('box_container'));
}
