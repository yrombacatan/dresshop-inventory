<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Repositories\ExpenseTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Flash;
use Response;

class ExpenseTypeController extends AppBaseController
{
    /** @var  ExpenseTypeRepository */
    private $expenseTypeRepository;

    public function __construct(ExpenseTypeRepository $expenseTypeRepo)
    {
        $this->expenseTypeRepository = $expenseTypeRepo;
    }

    /**
     * Display a listing of the ExpenseType.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $expenseTypes = $this->expenseTypeRepository->all();

        return view('expense_types.index')
            ->with('expenseTypes', $expenseTypes);
    }

    /**
     * Show the form for creating a new ExpenseType.
     *
     * @return Response
     */
    public function create()
    {
        return view('expense_types.create');
    }

    /**
     * Store a newly created ExpenseType in storage.
     *
     * @param CreateExpenseTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenseTypeRequest $request)
    {
        $input = $request->all();

        $input['slug'] = Str::slug($request->name, '-');
        $expenseType = $this->expenseTypeRepository->create($input);

        Flash::success('Expense Type saved successfully.');

        return redirect(route('expenseTypes.index'));
    }

    /**
     * Display the specified ExpenseType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expenseType = $this->expenseTypeRepository->find($id);

        if (empty($expenseType)) {
            Flash::error('Expense Type not found');

            return redirect(route('expenseTypes.index'));
        }

        return view('expense_types.show')->with('expenseType', $expenseType);
    }

    /**
     * Show the form for editing the specified ExpenseType.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expenseType = $this->expenseTypeRepository->find($id);

        if (empty($expenseType)) {
            Flash::error('Expense Type not found');

            return redirect(route('expenseTypes.index'));
        }

        return view('expense_types.edit')->with('expenseType', $expenseType);
    }

    /**
     * Update the specified ExpenseType in storage.
     *
     * @param int $id
     * @param UpdateExpenseTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenseTypeRequest $request)
    {
        $expenseType = $this->expenseTypeRepository->find($id);

        if (empty($expenseType)) {
            Flash::error('Expense Type not found');

            return redirect(route('expenseTypes.index'));
        }
        $request['slug'] = Str::slug($request->name, '-');
        $expenseType = $this->expenseTypeRepository->update($request->all(), $id);

        Flash::success('Expense Type updated successfully.');

        return redirect(route('expenseTypes.index'));
    }

    /**
     * Remove the specified ExpenseType from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expenseType = $this->expenseTypeRepository->find($id);

        if (empty($expenseType)) {
            Flash::error('Expense Type not found');

            return redirect(route('expenseTypes.index'));
        }

        $this->expenseTypeRepository->delete($id);

        Flash::success('Expense Type deleted successfully.');

        return redirect(route('expenseTypes.index'));
    }
}
