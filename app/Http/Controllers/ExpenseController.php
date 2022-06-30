<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Repositories\ExpenseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Expense;
use Flash;
use Response;
use DB;

class ExpenseController extends AppBaseController
{
    /** @var  ExpenseRepository */
    private $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepo)
    {
        $this->expenseRepository = $expenseRepo;
    }

    /**
     * Display a listing of the Expense.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$expenses = $this->expenseRepository->all();
        $expenses = DB::table('expense')
            ->join('expense_type', 'expense_type.id', '=', 'expense.expense_type_id')
            ->whereNull('expense.deleted_at')
            ->select('expense_type.name as type', 'expense.*')
            ->get();

        return view('expenses.index')
            ->with('expenses', $expenses);
    }

    /**
     * Show the form for creating a new Expense.
     *
     * @return Response
     */
    public function create()
    {   
        $expenseType = array('' => 'Select expense type') + DB::table('expense_type')->pluck('name','id')->all();
        return view('expenses.create', compact('expenseType'));
    }

    /**
     * Store a newly created Expense in storage.
     *
     * @param CreateExpenseRequest $request
     *
     * @return Response
     */
    public function store(CreateExpenseRequest $request)
    {
        $input = $request->all();

        $expense = $this->expenseRepository->create($input);

        foreach($request->item as $key => $v) {
            $item = [
                'item' => $request->item[$key],
                'quantity' => $request->quantity[$key],
                'rate' => $request->rate[$key],
                'total' => $request->total[$key],
                'expense_id' => $expense->id,
            ];
            DB::table('expense_details')->insert($item);
        }
        Flash::success('Expense saved successfully.');

        return redirect(route('expenses.index'));
    }

    /**
     * Display the specified Expense.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $expense = $this->expenseRepository->find($id);
        $expenseDetails = Expense::find($expense->id)->expenseDetails()->get();
        $type = Expense::find($expense->id)->expenseType()->first('name');

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('expenses.index'));
        }

        return view('expenses.show', compact('type','expenseDetails'))
            ->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified Expense.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $expense = $this->expenseRepository->find($id);
        $expenseType = array('' => 'Select expense type') + DB::table('expense_type')->pluck('name','id')->all();
        $expenseDetails = Expense::find($expense->id)->expenseDetails()->get();

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('expenses.index'));
        }

        return view('expenses.edit', compact('expenseType', 'expenseDetails'))
            ->with('expense', $expense);
    }

    /**
     * Update the specified Expense in storage.
     *
     * @param int $id
     * @param UpdateExpenseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateExpenseRequest $request)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('expenses.index'));
        }
        
        $expense = $this->expenseRepository->update($request->all(), $id);
        
        DB::table('expense_details')->where('expense_id', $expense->id)->delete(); // delete existing expense details

        foreach($request->item as $key => $v) {
            $item = [
                'item' => $request->item[$key],
                'quantity' => $request->quantity[$key],
                'rate' => $request->rate[$key],
                'total' => $request->total[$key],
                'expense_id' => $expense->id,
            ];
            DB::table('expense_details')->insert($item);
        }

        Flash::success('Expense updated successfully.');

        return redirect(route('expenses.index'));
    }

    /**
     * Remove the specified Expense from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $expense = $this->expenseRepository->find($id);

        if (empty($expense)) {
            Flash::error('Expense not found');

            return redirect(route('expenses.index'));
        }

        $this->expenseRepository->delete($id);

        Flash::success('Expense deleted successfully.');

        return redirect(route('expenses.index'));
    }
}
