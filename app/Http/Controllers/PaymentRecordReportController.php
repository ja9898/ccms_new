<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentRecordReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$selected_fromDate='';
		$selected_toDate='';
		if($request->get('dateFrom') || $request->get('dateTo')){
			$selected_fromDate = $request->get('dateFrom');
			$selected_toDate = $request->get('dateTo');
		}
		return view('payment_record_report.list',compact('selected_fromDate','selected_toDate'));
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		return view('payment_record_report.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function export_csv($st_dt,$en_dt)
	{
		//
		echo $st_dt;
		echo $en_dt;
		//exit;
		return view('payment_record_report.export_csv',compact('st_dt','en_dt'));
	}
}
