<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\DailyReportRequest;
use App\Models\DailyReport;
use Illuminate\Support\Facades\Auth;

class DailyReportController extends Controller
{
    protected $reports;

    public function __construct(DailyReport $instanceClass)
    {
        $this->middleware('auth');
        $this->reports = $instanceClass;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputMonth = $request->input('search_month');
        $userId = Auth::id();
        if (isset($inputMonth)) {
            $userInfos = $this->reports->fetchSearchingMonth($inputMonth, $userId);
        } else {
            $userInfos = $this->reports->getByUserId($userId);
        }
        return view('user.daily_report.index', compact('userInfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DailyReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->reports->fill($input)->save();
        return redirect()->to('dailyreport');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infos = $this->reports->find($id);
        return view('user.daily_report.show', compact('infos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infos = $this->reports->find($id);
        return view('user.daily_report.edit', compact('infos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DailyReportRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        $input = $request->all();
        $this->reports->find($id)->fill($input)->save();
        return redirect()->to('dailyreport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $infos = $this->reports->find($id)->delete();
        return redirect()->to('dailyreport');
    }
}
