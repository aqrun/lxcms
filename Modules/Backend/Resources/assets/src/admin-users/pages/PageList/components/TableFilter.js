import { __ } from 'app/common/language';

export default (props) => {
    let style = {display:'none'};
    if(props.show){
        style.display = 'block';
    }
    return (
        <div className="box-header with-border" id="filter-box" style={style}>
            <form action="" className="form-horizontal">
                <div className="box-body">
                    <div className="fields-group">
                        <div className="form-group">
                            <label htmlFor="" className="col-sm-2 control-label">ID</label>
                            <div className="col-sm-8">
                                <div className="input-group">
                                    <div className="input-group-addon"><i className="fa fa-pencil"></i></div>
                                    <input type="text" className="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="box-footer">
                    <div className="col-sm-8 col-sm-offset-2">
                        <div className="btn btn-sm btn-info pull-left submit"><i className="fa fa-search"></i>{__('Apply')}</div>
                        <a href="" className="btn btn-sm btn-default" style={{marginLeft:'10px'}}>
                            <i className="fa fa-undo"></i>{__('Reset')}</a>
                    </div>
                </div>
            </form>
        </div>
    );
}