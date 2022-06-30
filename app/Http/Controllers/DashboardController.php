<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Flash;
use Response;

class DashboardController extends AppBaseController
{
    /**
     * Display a listing of the Dashboard.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Dashboard $dashboards */
        // $dashboards = Dashboard::all();

        return view('dashboards.index');
            //->with('dashboards', $dashboards);
    }

    /**
     * Show the form for creating a new Dashboard.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboards.create');
    }

    /**
     * Store a newly created Dashboard in storage.
     *
     * @param CreateDashboardRequest $request
     *
     * @return Response
     */
    public function store(CreateDashboardRequest $request)
    {
        $input = $request->all();

        /** @var Dashboard $dashboard */
        $dashboard = Dashboard::create($input);

        Flash::success('Dashboard saved successfully.');

        return redirect(route('dashboards.index'));
    }

    /**
     * Display the specified Dashboard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dashboard $dashboard */
        $dashboard = Dashboard::find($id);

        if (empty($dashboard)) {
            Flash::error('Dashboard not found');

            return redirect(route('dashboards.index'));
        }

        return view('dashboards.show')->with('dashboard', $dashboard);
    }

    /**
     * Show the form for editing the specified Dashboard.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Dashboard $dashboard */
        $dashboard = Dashboard::find($id);

        if (empty($dashboard)) {
            Flash::error('Dashboard not found');

            return redirect(route('dashboards.index'));
        }

        return view('dashboards.edit')->with('dashboard', $dashboard);
    }

    /**
     * Update the specified Dashboard in storage.
     *
     * @param int $id
     * @param UpdateDashboardRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDashboardRequest $request)
    {
        /** @var Dashboard $dashboard */
        $dashboard = Dashboard::find($id);

        if (empty($dashboard)) {
            Flash::error('Dashboard not found');

            return redirect(route('dashboards.index'));
        }

        $dashboard->fill($request->all());
        $dashboard->save();

        Flash::success('Dashboard updated successfully.');

        return redirect(route('dashboards.index'));
    }

    /**
     * Remove the specified Dashboard from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dashboard $dashboard */
        $dashboard = Dashboard::find($id);

        if (empty($dashboard)) {
            Flash::error('Dashboard not found');

            return redirect(route('dashboards.index'));
        }

        $dashboard->delete();

        Flash::success('Dashboard deleted successfully.');

        return redirect(route('dashboards.index'));
    }
}
