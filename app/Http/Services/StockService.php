<?php
namespace App\Http\Services;
use App\Http\Services\MediaService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class StockService {

    public $model;
    public function __construct($model){
        $this->model = $model;
    }
    public function edit($banner_id){
        return $this->model::find($banner_id);
    }

    public function list($request,$conditions=[]){
        $listData = [];
        $searchValue = $request->query('search')['value'];
        $lists =  $this->model::where(function ($query) use ($searchValue,$request){
            $filters = $request->input('params');
            if ($filters) {
                foreach ($filters as $filter) {
                    $query->orWhere($filter,'like','%'. $searchValue . '%');
                }
            }
        });
        if($conditions){
            $lists = $lists->where($conditions);
        }
        $totalRecords = $lists->count();
        $lists = $lists->offset($request->input('start'))->limit($request->input('length'));
        $lists = $lists->get();
        $listData['draw'] = intval($request->input('draw'));
        $listData['recordsTotal'] = $totalRecords;
        $listData['recordsFiltered'] = $totalRecords;
        $listData['data'] = $lists;
        return $listData;
    }

    public function getAll(){
        return $this->model::paginate(10);
    }
    public function filter(Object $request){
        $transaction = $this->model::with(['user','mess_owner']);
        $transaction = $transaction->orderBy('transaction_date','DESC')->get();
        return $transaction;
    }
    public function store(Object $request){
        $data = $this->model::create($request->toArray());
        $data = $this->model::find($data->id);
        return $data;
    }
    public function update(Object $request){
        $data = $this->model::find($request->id);
        $datas = $data->update($request->toArray());
        return $data;
    }
    public function delete($id,$file_tag = ''){
        $banner = $this->model::find($id);
        return $banner->delete();
    }
 }
?>
