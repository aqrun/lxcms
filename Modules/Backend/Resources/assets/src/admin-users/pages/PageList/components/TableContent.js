import React from 'react';
import ReactTable from 'react-table';
import { __ } from 'app/common/language';
import {
    InputFilter
} from 'app/filters';

export default (props) => {
    let { data, loading, pages } = props;
    return (
        <div className="box-body table-responsive no-padding">
            <ReactTable
                data={data}
                loading={loading}
                onFetchData={props.fetchData}
                manual
                pages={pages}
                filterable
                defaultSorted={[{id:'created_at',desc:true}]}
                columns={[
                    {Header: 'ID', accessor: 'id',width:60, Filter: InputFilter},
                    {Header: __('Avatar'), accessor: 'avatar', width:60, Filter:()=>'',
                        Cell: (row) => {
                            return <img src={row['value']} style={{maxWidth:'50px'}}/>;
                        }
                    },
                    {Header: __('Name'), accessor: 'name', Filter: InputFilter},
                    {Header: __('Username'), accessor:'username', Filter: InputFilter},
                    {Header: __('Email'), accessor:'email', Filter: InputFilter},
                    {Header: __('Weight'), accessor:'weight', width:60, Filter: InputFilter},
                    {Header: __('Status'), accessor:'status', width:80, Filter: InputFilter,
                        Cell: row => (
                            <span>{row['value']?'Active':'Inactive'}</span>
                        )
                    },
                    {Header: __('Created At'), width:160,accessor:'created_at',Filter:()=>'',
                        Cell: row => {
                            return row['original']['created_str'];
                        }
                    },
                    {Header: __('Actions'), accessor: 'id', width: 110, Filter: ()=>'',
                        Cell: row => (
                            <div className="btn-group">
                                <a className="btn btn-sm btn-success" href={row['lastName']}>
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
                rowsText={__('table_rows')}
                pageText={__('table_Page')}
                ofText={__('table_of')}
                nextText={__('table_Next')}
                previousText={__('table_Previous')}
                defaultPageSize={10}
                className="-striped -highlight"
            />
        </div>
    );
}
