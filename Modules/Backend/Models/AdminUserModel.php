<?php

namespace Modules\Backend\Models;

use Modules\Backend\Entities\AdminUser;
use Modules\Backend\Helpers\TimeHelper;
use Illuminate\Http\Request;

class AdminUserModel extends BaseModel
{
    public function getList(Request $request)
    {

        $columns = [
            0 => 'id',
            1 => 'title',
            2 => 'body',
            3 => 'created_at',
        ];

        $query = AdminUser::query();

        $totalData = $query->count();
        $totalFiltered = $totalData;

        $limit = $request->input('length')??10;
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')] ?? '';
        $dir = $request->input('order.0.dir') ?? 'desc';

        $this->setFilter($query, $request);
        $totalFiltered = $query->count();

        if(!empty($order)){
            $query->orderBy($order,$dir);
        }else{
            $query->orderBy('created_at', $dir);
        }

        $list = $query->limit($limit)
            ->offset($start)
            ->get();

        $data = [];
        foreach ($list as $k => $v)
        {
            $item = [
                'id' => $v->id,
                'username' => $v->username,
                'name' => $v->name,
                'email' => $v->email,
                'mobile' => $v->mobile,
                'weight' => $v->weight,
                'status' => $v->status,
                'gender' => $v->gender,
                'birthday' => TimeHelper::utcToLocal('Y-m-d H:i:s', $v->birthday),
                'avatar' => $v->avatar,
                'timezone' => $v->timezone,
                'created_at' => $v->created_at->timestamp,
                'updated_at' => $v->updated_at->timestamp,
                'created_str' => TimeHelper::utcToLocal('Y-m-d H:i:s', $v->created_at->timestamp),
                'updated_str' => TimeHelper::utcToLocal('Y-m-d H:i:s', $v->updated_at->timestamp),
            ];
            $data[] = $item;
        }


        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data,
           // 'current' => $current,
            //'pageSize' => $pageSize,
        );

        return $json_data;
    }

    /**
     * 设置搜索条件
     * @param $query
     * @param $filter
     */
    protected function setFilter(&$query, &$request)
    {
        //search filter
        $search = $request->input('search.value');
        $query->when(!empty($search), function($query) use ($search) {
            $query->where('username','LIKE',"%{$search}%")
                ->orWhere('name', 'LIKE',"%{$search}%");
        });

        //table filers
        $inputColumns = $request->input('columns') ?? [];
        foreach($inputColumns as $k=>$v){
            $query->when(!empty($v['search']['value']), function($query) use ($v) {
                $query->where($v['name'], 'LIKE', "%{$v['search']['value']}%");
            });
        }
    }
}
