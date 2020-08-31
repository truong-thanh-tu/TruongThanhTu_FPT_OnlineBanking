<?php

namespace App\Http\Controllers\privates;

use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Beneficiaries;
use App\Model\publicModel;
use App\Model\Transaction;
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
    public function showDetailHistory($IDTransaction)
    {
        $objTS = new Transaction();
        $getData = $objTS->getTransaction($IDTransaction)->first();

        return view('private.history.detailHistoryTransactionPrivate',compact('getData'));

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
        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);
        $getDataBeneficiaries = $objBeneficiaries->getBeneficiaries('=', $getDataTypeAccountCustomer->account->IDAccount);

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
        $objMP = new publicModel();
        $objBF = new Beneficiaries();
        $objAccount = new Account();

        $valueIDCustomer = $request->session()->get('IDCustomer');
        $valueIDTypeAccount = 1;
        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);

        $codeTransaction = mt_rand(10000, 99999);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $transaction = array(
            'idTypeAccountCustomer' => $getDataTypeAccountCustomer->IDTypeAccountCustomer,
            'idAccount'=>$getDataTypeAccountCustomer->account->IDAccount,
            'idBank' => 1,
            'accountSource' => $getDataTypeAccountCustomer->account->AccountSourceNumber,
            'codeTransaction' => $codeTransaction,
            'accountNumber' => $request->input('accountNumber'),
            'nameBeneficiary' => $request->input('nameBeneficiary'),
            'money' => $request->input('money'),
            'contentTransaction' => $request->input('contentTransaction'),
            'feePayer' => $request->input('feePayers'),
            'fee' => (($request->input('money')) * 2) / 100,
            'dateTransaction' => $dt->toDateString(),
            'email' => $getDataTypeAccountCustomer->customer->Email,
        );
        session()->put('transaction', $transaction);

        if ($objAccount->checkUser($transaction['accountNumber'])) {
            $check = $objMP->compareMoney($transaction['money'], $getDataTypeAccountCustomer->account->IDAccount);
            if ($check) {
                if ($request->input('saveName')) {
                    if ($objBF->checkBeneficiaries($transaction['accountNumber'])) {
                        $objBF->saveBeneficiaries($transaction['accountNumber'], $transaction['nameBeneficiary'], $getDataTypeAccountCustomer->account->IDAccount);
                    }
                }
                return view('private.transaction.inSystem.confirmInfoTransactionInSystem', compact('transaction', 'getDataTypeAccountCustomer'));
            } else {
                Session::flash('error', 'The amount in the account is not enough');
                return redirect('/private/transaction/InSystem');
            }
        } else {
            Session::flash('error', 'Account not have in system');
            return redirect('/private/transaction/InSystem');
        }

    }

    /**
     * showReceiveCodeOTPInSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReceiveCodeOTPInSystem(Request $request)
    {
        $infoTransaction = $request->session()->get('transaction');

        /*  Mail::send('component.Email',[
              'name'=>'Thanh Tu',
          ],function ($msg){
              $msg->from('onlinebankingtreet@gmail.com','Tu1');
              $msg->to('onlinebankingtreet@gmail.com','Tu2');
              $msg->subject('Đay là email test ');
          });*/
        $codeOTP = mt_rand(1000, 9999);
        session()->put('codeOTP', $codeOTP);

        return view('private.transaction.inSystem.receiveCodeOTPInSystem', compact('codeOTP'));
    }

    /**
     * showAlertsSuccessTransactionInSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlertsSuccessTransactionInSystem(Request $request)
    {
        if ($request->input('codeOPT') == $request->session()->get('codeOTP')) {
            $transaction = $request->session()->get('transaction');
            $codeOTP = $request->session()->get('codeOTP');

            $addTransaction = new Transaction();

            $addTransaction->saveTransaction($transaction, $codeOTP);

            return view('private.transaction.inSystem.alertsSuccessTransactionInSystem', compact('transaction'));

        } else {
            Session::flash('error', 'The otp code you entered was wrong');
            return redirect('/private/transaction/InSystem/receive');
        }

    }

    /**
     * showTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTransactionOutSystem(Request $request)
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
