<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Str;


class AgentController extends Controller
{


    public function data (DataTables $dataTables)
    {
        $data = Agent::query()
        ->latest();

        return $dataTables->eloquent($data)
        ->editColumn('harga', fn($data) => number_format($data->harga))
        ->addColumn('action', function($data){
            $edit = "<a href='".route('agent.edit',$data->id)."' class='text-success' title='Edit Data'><i class='bx bxs-edit bx-sm'></i></a>";
            $delete = "<a href='javascript:;' class='text-danger' onclick='fn_deleteData(".'"'.route('agent.destroy',$data->id).'"'.")' title='Hapus Data'><i class='bx bxs-trash bx-sm'></i></a>";

            return $edit.'  '.$delete;
        })
        ->toJson();

    }
    public function index(){
      return view('pages.agent.index');
    }

    public function testsearchh(){
        return view('pages.agent.testsearch');
    }

    public function searchquery(Request $request){

        $data = DB::select('select nama as label,id,harga,qty from agent');
        return response()->json($data);
    }

    public function destroy (Agent $agent){
        try {
            $agent->delete();
            return  $this->toastSuccess('Edit','Data agent berhasil di edit.'); //response()->json(["Succes" => 'Hapus Data Berhasil.']);
        } catch (\Exception $e) {
            $this->toasGagal('Delete','Error'. $e->getMessage());
            return response()->json(["error" => $e->getMessage()]);
        }

    }

    public function create(){
        return view('pages.agent.create');
    }


    public function edit(Agent $agent){

        return view('pages.agent.create', compact('agent'));
    }

    public function update(AgentRequest $request, Agent $agent){

    try {
            $agent->update($request->validated());
            $this->toastSuccess('Edit','Data agent berhasil di edit.');

            return redirect( route('agent.index') );
        } catch (\Exception $e) {

            $this->toasGagal('Update','Error'. $e->getMessage());
            return response()->json(["error" => $e->getMessage()]);
            }
    }

    public function store(AgentRequest $request)
    {
	// insert data ke table pegawai
     //  dd($request->validated());
     try {
        Agent::query()->create($request->validated());

        $this->toastSuccess('Tambah','Data agent berhasil disimpan.');
	    return redirect( route('agent.index') );
     } catch (\Exception $e) {

        $this->toasGagal('Tambah','Error'. $e->getMessage());
        return response()->json(["error" => $e->getMessage()]);
     }

    }
}
