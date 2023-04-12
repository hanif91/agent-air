<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class PenjualanController extends Controller
{

    public function index()
    {
        return view('pages.penjualan.index');
    }

    public function pembayaran()
    {
        $table = Penjualan::query()->with('agent')->where('flaglunas', '0')->get();

        return view('pages.penjualan.pembayaran', compact('table'));
    }

    public function bayar(Penjualan $penjualan)
    {

        return view('pages.penjualan.bayar',compact('penjualan'));
    }

    public function actionbayar(Penjualan $penjualan)
    {
       $penjualan->update([
         'flaglunas'=>"1",
         'tglbayar' => now()
       ]);

       $this->toastSuccess('Pembayaran','Data Pembayaran berhasil disimpan.');
       return redirect( route('pembayaran'));
    }

    public function laporan_penjualan()
    {
        return view('pages.penjualan.laporan');
    }

    public function print_penjualan()
    {
        return view('pages.penjualan.print');
    }

    public function filter_data(Request $request, $tanggal, $valflaglunas)
    {

        //  return ($request);
        $arrtanngal =  explode(" - ",$tanggal);
        $arrflaglunas = explode(" - ",$valflaglunas);
        $stateCflaglunas = $arrflaglunas[0];
        $flaglunas = $arrflaglunas[1];

        $data = Penjualan::query()->with('agent')

        ->whereRaw('date(created_at) between ? and ?',$arrtanngal);
        if ($stateCflaglunas == "1") {
           $data = $data->where('flaglunas',$flaglunas);
        };

        $data = $data->get();

        return response()->json($data);


    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        DB::transaction(function () use($request) {


            $data = collect(json_decode($request->data));
            foreach ($data as $val) {

                $penjualan = Penjualan::create(Arr::only((array)$val,['agent_id','harga','qty','total']));
                $penjualan->agent()->increment('qty', $val->qtyss);

            }
        });

        $this->toastSuccess('Penjualan','Data Penjualan berhasil disimpan.');
        return redirect( route('penjualan.index'));


    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
