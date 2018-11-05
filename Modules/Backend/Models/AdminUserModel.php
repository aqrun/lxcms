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

        $pageSize = $request->input('pageSize')??10;
        $page = $request->input('page');
        $sorted = $request->input('sorted', []);
        $filtered = $request->input('filtered', []);

        $this->setFilter($query, $filtered);
        $totalFiltered = $query->count();

        $this->setSorted($query, $sorted);

        $list = $query->limit($pageSize)
            ->offset(intval($page)* $pageSize)
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
            'page' => intval($page),
            'pageSize' => intval($pageSize),
            'pages' => intval($totalFiltered),
            "recordsTotal"    => intval($totalData),
            "data"            => $data,
        );

        return $json_data;
    }

    protected function setSorted(&$query, &$sorted)
    {
        if(empty($sorted)){
            $query->orderBy('created_at', 'desc');
        }else{
            foreach ($sorted as $v){
                $query->orderBy($v['id'], $v['desc']?'desc':'asc');
            }
        }
    }

    /**
     * 设置搜索条件
     * @param $query
     * @param $filter
     */
    protected function setFilter(&$query, &$filtered)
    {
        if(empty($filtered)) return;

        foreach($filtered as $v){
            $query->where($v['id'], 'LIKE', "%{$v['value']}%");
        }

        //table filers
//        $inputColumns = $request->input('columns') ?? [];
//        foreach($inputColumns as $k=>$v){
//            $query->when(!empty($v['search']['value']), function($query) use ($v) {
//                $query->where($v['name'], 'LIKE', "%{$v['search']['value']}%");
//            });
//        }
    }
}
