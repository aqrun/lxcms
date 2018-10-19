
import ReactTable from 'react-table';


export default (props) => {
    return (
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
    );
}
