<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StockRequest;
use App\Http\Services\StockService;
use App\Models\Stock;
Class StockController extends Controller {
    public function __construct()
    {

    }

    public function index(Request $request) {
        return view('pages.admin.stock.index');
    }

    // Add New Stock Page
    public function create(Request $request) {
        return view('pages.admin.stock.add-edit');
    }

    // Add New Stock Page
    public function store(StockRequest $request) {

        $service = new StockService(Stock::class);
        $service = $service->store($request);
        return response()->json(['status'=>($service) ? 200 : 400,'msg'=>($service) ? 'Action performed successfully' : 'Something went wrong','url'=>($service) ? route('stock.list') : '']);

    }

    // Stock List in Datatables
    public function list(Request $request)
    {
        $service = new StockService(Stock::class);
        $data = $service->list($request);
        return response()->json(['status'=>200,'msg'=>'Action performed successfully !!','data'=>$data['data'],'draw'=>$data['draw'],'recordsTotal'=>$data['recordsTotal'],'recordsFiltered' => $data['recordsFiltered']]);
    }
    // Edit New Stock Page
    public function edit($id) {
        $service = new StockService(Stock::class);
        $stock = $service->edit($id);
        return view('pages.admin.stock.add-edit',compact('stock'));
    }

    // Update Stock in DB
    public function update(StockRequest $request)
    {
        $service = new StockService(Stock::class);
        $service = $service->update($request);
        return response()->json(['status'=>($service) ? 200 : 400,'msg'=>($service) ? 'Action performed successfully' : 'Something went wrong','url'=>($service) ? route('stock.list') : '']);
    }
    // Delete  Stock from  DB
    public function delete($id,Request $request)
    {
        $service = new StockService(Stock::class);
        $service = $service->delete($id,'BANNER_IMAGE');
        return response()->json(['status'=>($service) ? 200 : 400,'msg'=>($service) ? 'Action performed successfully' : 'Something went wrong','url'=>($service) ? route('stock.list') : '']);
    }
}
