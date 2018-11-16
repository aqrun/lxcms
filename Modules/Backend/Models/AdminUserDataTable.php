<?php

namespace Modules\Backend\Models;

use Modules\Backend\Entities\AdminUser;
use Yajra\DataTables\Services\DataTable;

class AdminUserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param AdminUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AdminUser $model)
    {
        return $model->newQuery();
            //->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->postAjax([
                'url' => \Backend::baseUrl('/admin-users/test-index'),
                'data' => <<<jsstr
function(d){d.key="value";}
jsstr
            ])
            ->columns($this->getColumns())
            ->addCheckbox([
                'defaultContent' => '<input type="checkbox" />',
                'title'=> '<input type="checkbox" id="dataTablesCheckbox"/>',
                'data'=> 'checkbox', 'name'=> 'checkbox', 'width' => '10px',
            ], 0)
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data'=>'id', 'name'=>'id', 'title'=>'ID'],
            ['data'=>'avatar', 'name'=>'avatar', 'title'=>'avatar'],
            ['data'=>'name', 'name'=>'name', 'title'=>'name'],
            ['data'=>'username', 'name'=>'username', 'title'=>'username'],
            ['data'=>'email', 'name'=>'email', 'title'=>'email'],
            ['data'=>'weight', 'name'=>'weight', 'title'=>'weight'],
            ['data'=>'status', 'name'=>'status', 'title'=>'status'],
            ['data'=>'created_at', 'name'=>'created_at', 'title'=>'created_at'],
            ['data'=>'id', 'name'=>'id', 'title'=>'Action'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AdminUsers_' . date('YmdHis');
    }

    protected function getBuilderParameters()
    {
        $config = parent::getBuilderParameters();
        $config = array_merge($config, [
            'dom'     => 'Bfrtip',
            'order'   => [[8, 'desc']],
            'buttons' => [
                'create',
                'export',
                'print',
                'reset',
                'reload',
            ],
        ]);
        return $config;
    }
}
