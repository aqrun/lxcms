import { __ } from 'app/common/language';

export default (props) => {
    return (
        <div className="box-header with-border">
            <div className="pull-left">
                <a className="btn btn-sm btn-primary grid-refresh">
                    <i className="fa fa-refresh"></i> {__('Refresh')}
                </a>
                <a className="btn btn-sm btn-dropbox btn-filter" onClick={props.btnFilterClickHandle}>
                    <i className="fa fa-filter"></i> {__('Filter')}
                </a>
            </div>
            <div className="pull-right">
                <div className="btn-group pull-right" style={{marginRight:'10px'}}>
                    <a href="{{ \Backend::baseUrl('/admin-users/create') }}" className="btn btn-sm btn-success">
                        <i className="fa fa-plus"></i>&nbsp;&nbsp;{__('New')}
                    </a>
                </div>
            </div>
        </div>
    );
}
