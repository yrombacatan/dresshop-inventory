<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLoanerRequest;
use App\Http\Requests\UpdateLoanerRequest;
use App\Repositories\LoanerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LoanerController extends AppBaseController
{
    /** @var  LoanerRepository */
    private $loanerRepository;

    public function __construct(LoanerRepository $loanerRepo)
    {
        $this->loanerRepository = $loanerRepo;
    }

    /**
     * Display a listing of the Loaner.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $loaners = $this->loanerRepository->all();

        return view('loaners.index')
            ->with('loaners', $loaners);
    }

    /**
     * Show the form for creating a new Loaner.
     *
     * @return Response
     */
    public function create()
    {
        return view('loaners.create');
    }

    /**
     * Store a newly created Loaner in storage.
     *
     * @param CreateLoanerRequest $request
     *
     * @return Response
     */
    public function store(CreateLoanerRequest $request)
    {
        $input = $request->all();

        $loaner = $this->loanerRepository->create($input);

        Flash::success('Loaner saved successfully.');

        return redirect(route('loaners.index'));
    }

    /**
     * Display the specified Loaner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loaner = $this->loanerRepository->find($id);

        if (empty($loaner)) {
            Flash::error('Loaner not found');

            return redirect(route('loaners.index'));
        }

        return view('loaners.show')->with('loaner', $loaner);
    }

    /**
     * Show the form for editing the specified Loaner.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loaner = $this->loanerRepository->find($id);

        if (empty($loaner)) {
            Flash::error('Loaner not found');

            return redirect(route('loaners.index'));
        }

        return view('loaners.edit')->with('loaner', $loaner);
    }

    /**
     * Update the specified Loaner in storage.
     *
     * @param int $id
     * @param UpdateLoanerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoanerRequest $request)
    {
        $loaner = $this->loanerRepository->find($id);

        if (empty($loaner)) {
            Flash::error('Loaner not found');

            return redirect(route('loaners.index'));
        }

        $loaner = $this->loanerRepository->update($request->all(), $id);

        Flash::success('Loaner updated successfully.');

        return redirect(route('loaners.index'));
    }

    /**
     * Remove the specified Loaner from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loaner = $this->loanerRepository->find($id);

        if (empty($loaner)) {
            Flash::error('Loaner not found');

            return redirect(route('loaners.index'));
        }

        $this->loanerRepository->delete($id);

        Flash::success('Loaner deleted successfully.');

        return redirect(route('loaners.index'));
    }
}
