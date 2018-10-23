
import ReactTable from 'react-table';
import { __ } from 'app/common/language';

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
                    {Header: 'ID', accessor: 'id',width:30},
                    {Header: __('Avatar'), accessor: 'avatar', width:60, Filter:()=>'',
                        Cell: (row) => {
                            return <img src={row['value']} style={{maxWidth:'50px'}}/>;
                        }
                    },
                    {Header: __('Name'), accessor: 'name'},
                    {Header: __('Username'), accessor:'username'},
                    {Header: __('Email'), accessor:'email'},
                    {Header: __('Weight'), accessor:'weight', width:60},
                    {Header: __('Status'), accessor:'status', width:80,
                        Cell: row => (
                            <span>{row['value']?'Active':'Inactive'}</span>
                        )
                    },
                    {Header: __('Created At'), accessor:'created_at',Filter:()=>'',
                        Cell: row => {
                            return row['original']['created_str'];
                        }
                    },
                    {Header: __('Actions'), accessor: 'id', width: 110, Filter: ()=>'',
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
