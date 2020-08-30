<?php

namespace App\Http\Controllers\privates;

use App\Http\Controllers\Controller;
use App\Model\Beneficiaries;
use App\Model\publicModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Session;

class PrivateController extends Controller
{
    /**
     * showInfoAccount
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showInfoAccount(Request $request)
    {

        $objMP = new publicModel();
        $getDataTypeAccountCustomers = $objMP->getID($request);

        return view('private.information.accountInfoPrivate', compact('getDataTypeAccountCustomers'));
    }

    /**
     * showDetailInfoAccount
     * @param $theIDTypeAccountCustomer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailInfoAccount($theIDTypeAccountCustomer)
    {
        $objMP = new publicModel();
        $getDataTypeAccountCustomer = $objMP->getTypeAccountCustomer($theIDTypeAccountCustomer);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        return view('private\information\detailAccountInfoPravite', compact('getDataTypeAccountCustomer', 'dt'));
    }

    /**
     * showHistory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHistory()
    {
        $objMP = new publicModel();
        $getHistoryInSystems = $objMP->getHistory(1, '=');
        $getHistoryOutSystems = $objMP->getHistory(1, '<>');
        return view('private.history.historyTransactionPrivate', compact('getHistoryInSystems', 'getHistoryOutSystems'));
    }

    /**
     * showDetailHistory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailHistory()
    {
        return view('private.history.detailHistoryTransactionPrivate');

    }

    /**
     * showTransactionInSystem
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTransactionInSystem(Request $request)
    {
        $valueIDCustomer = $request->session()->get('IDCustomer');
        $valueIDTypeAccount = 1;

        $objMP = new publicModel();
        $objBeneficiaries = new Beneficiaries();
        $getDataBeneficiaries = $objBeneficiaries->getBeneficiaries('=');
        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);

        return view('private.transaction.inSystem.transactionInSystem', compact('getDataTypeAccountCustomer', 'getDataBeneficiaries', 'dt'));

    }

    /**
     * postTransactionInSystem
     * @param Request $request
     * @return string
     */
    public function postTransactionInSystem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
            'nameBeneficiary' => 'required',
            'money' => 'required',
            'contentTransaction' => 'required',
            'feePayers' => 'required',
        ], [
            'accountNumber.required' => 'accountNumber required',
            'nameBeneficiary.required' => 'nameBeneficiary required',
            'money.required' => 'money required',
            'contentTransaction.required' => 'contentTransaction required',
            'feePayers.required' => 'transferPerson required',
        ]);
        if ($validator->fails()) {
            return redirect('private/transaction/InSystem')->withErrors($validator)->withInput();;
        }
        $transaction = array(
            'accountNumber' => $request->input('accountNumber'),
            'nameBeneficiary' => $request->input('nameBeneficiary'),
            'money' => $request->input('money'),
            'contentTransaction' => $request->input('contentTransaction'),
            'feePayers' => $request->input('feePayers'),
        );
        $objMP = new publicModel();
        $objBF = new Beneficiaries();

        $valueIDCustomer = $request->session()->get('IDCustomer');
        $valueIDTypeAccount = 1;

        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);
        $check = $objMP->compareMoney($transaction['money'], $getDataTypeAccountCustomer->account->IDAccount);

        if ($check) {
            if ($request->input('saveName')) {
                if ($objBF->checkBeneficiaries($transaction['accountNumber'])){
                    $objBF->saveBeneficiaries($transaction['accountNumber'],$transaction['nameBeneficiary']);
                }
            }
            return "DONE";
        } else {
            Session::flash('error', 'The amount in the account is not enough');
            return redirect('/private/transaction/InSystem');
        }


        return "DONE";
    }

    /**
     * showConfirmInfoTransactionInSystem
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConfirmInfoTransactionInSystem(Request $request)
    {

        return view('private.transaction.inSystem.confirmInfoTransactionInSystem');

    }

    /**
     * showReceiveCodeOTPInSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReceiveCodeOTPInSystem()
    {
        return view('private.transaction.inSystem.receiveCodeOTPInSystem');

    }

    /**
     * showAlertsSuccessTransactionInSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlertsSuccessTransactionInSystem()
    {
        return view('private.transaction.inSystem.alertsSuccessTransactionInSystem');

    }

    /**
     * showTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTransactionOutSystem()
    {
        return view('private.transaction.outSystem.transactionOutSystem');

    }

    /**
     * showConfirmInfoTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showConfirmInfoTransactionOutSystem()
    {
        return view('private.transaction.outSystem.confirmInfoTransactionOutSystem');

    }

    /**
     * showReceiveCodeOTPOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReceiveCodeOTPOutSystem()
    {
        return view('private.transaction.outSystem.receiveCodeOTPOutSystem');

    }

    /**
     * showAlertsSuccessTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlertsSuccessTransactionOutSystem()
    {
        return view('private\transaction\outSystem\alertSuccessTransactionOutSystem');

    }

    /**
     * showReport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReport()
    {
        return view('private.report.reportPrivate');
    }

    /**
     * showSupport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSupport()
    {
        return view('private.support.supportPrivate');
    }
}
