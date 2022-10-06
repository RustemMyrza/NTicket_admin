<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\MarketAnalysi;
use Illuminate\Http\Request;

class MarketAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $marketanalysis = MarketAnalysi::where('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $marketanalysis = MarketAnalysi::latest()->paginate($perPage);
        }

        return view('market-analysis.index', compact('marketanalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('market-analysis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        MarketAnalysi::create($requestData);

        return redirect('admin/market-analysis')->with('flash_message', 'Параграф добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $marketanalysi = MarketAnalysi::findOrFail($id);

        return view('market-analysis.show', compact('marketanalysi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $marketanalysi = MarketAnalysi::findOrFail($id);

        return view('market-analysis.edit', compact('marketanalysi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $marketanalysi = MarketAnalysi::findOrFail($id);
        $marketanalysi->update($requestData);

        return redirect('admin/market-analysis')->with('flash_message', 'Параграф изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MarketAnalysi::destroy($id);

        return redirect('admin/market-analysis')->with('flash_message', 'Параграф удален');
    }
}
