<?php

namespace App\Http\Controllers\privates;

use App\Http\Controllers\Controller;
use App\Model\Account;
use App\Model\Bank;
use App\Model\Beneficiaries;
use App\Model\publicModel;
use App\Model\Support;
use App\Model\Transaction;
use App\Model\TypeAccountCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PublicController;
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
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
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
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $objMP = new publicModel();
        $getDataTypeAccountCustomer = $objMP->getTypeAccountCustomer($theIDTypeAccountCustomer);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        return view('private\information\detailAccountInfoPravite', compact('getDataTypeAccountCustomer', 'dt'));
    }

    /**
     * showHistory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHistory(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }

        $dateToInSystem = $request->input('dateToInSystem');
        $dateFromInSystem = $request->input('dateFromInSystem');
        $dateToOutSystem = $request->input('dateToOutSystem');
        $dateFromOutSystem = $request->input('dateFromOutSystem');

        $objMP = new publicModel();

        $getHistoryInSystems = $objMP->getHistory(1, '=', $dateToInSystem, $dateFromInSystem);
        $getHistoryOutSystems = $objMP->getHistory(1, '<>', $dateToOutSystem, $dateFromOutSystem);
        return view('private.history.historyTransactionPrivate', compact('getHistoryInSystems', 'getHistoryOutSystems'));
    }

    /**
     * showDetailHistory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDetailHistory($IDTransaction)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $objTS = new Transaction();
        $getData = $objTS->getTransaction($IDTransaction)->first();
        return view('private.history.detailHistoryTransactionPrivate', compact('getData'));

    }

    /**
     * showTransactionInSystem
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTransactionInSystem(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
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
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
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
            'idAccount' => $getDataTypeAccountCustomer->account->IDAccount,
            'nameAccount' => $getDataTypeAccountCustomer->customer->FirstName,
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
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $infoTransaction = $request->session()->get('transaction');


        $codeOTP = mt_rand(1000, 9999);
        session()->put('codeOTP', $codeOTP);
        Mail::send('component.Email', [
            'CodeOTP' => $codeOTP, 'Name' => $infoTransaction['nameAccount']
        ], function ($msg) {
            $msg->from('onlinebankingTreet@gmail.com');
            $msg->to('onlinebankingTreet@gmail.com');
            $msg->subject('Gữi mã otp ');
        });
        return view('private.transaction.inSystem.receiveCodeOTPInSystem');
    }

    /**
     * showAlertsSuccessTransactionInSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlertsSuccessTransactionInSystem(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        if ($request->input('codeOPT') == $request->session()->get('codeOTP')) {
            $transaction = $request->session()->get('transaction');
            $codeOTP = $request->session()->get('codeOTP');

            $addTransaction = new Transaction();

            $addTransaction->saveTransaction($transaction, $codeOTP);
            Mail::send('component.Transaction', [
                'accountSource' => $transaction['accountSource'],
                'nameAccount' => $transaction['nameAccount'],
                'money' => $transaction['money'],
                'accountNumber' => $transaction['accountNumber'],
                'nameBeneficiary' => $transaction['nameBeneficiary'],
                'dateTransaction' => $transaction['dateTransaction'],
                'codeTransaction' => $transaction['codeTransaction'],
                'contentTransaction' => $transaction['contentTransaction'],
            ], function ($msg) {
                $msg->from('onlinebankingTreet@gmail.com');
                $msg->to('onlinebankingTreet@gmail.com');
                $msg->subject('Thông tin giao dịch ');
            });

            $inforNotification = array(
                'accountSource' => $transaction['accountSource'],
                'nameAccount' => $transaction['nameAccount'],
                'money' => $transaction['money'],
                'accountNumber' => $transaction['accountNumber'],
                'nameBeneficiary' => $transaction['nameBeneficiary'],
                'dateTransaction' => $transaction['dateTransaction'],
                'codeTransaction' => $transaction['codeTransaction'],
                'contentTransaction' => $transaction['contentTransaction'],

            );
            $request->session()->forget('transaction');
            $request->session()->forget('codeOTP');

            return view('private.transaction.inSystem.alertsSuccessTransactionInSystem', compact('inforNotification'));

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
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $valueIDCustomer = $request->session()->get('IDCustomer');
        $valueIDTypeAccount = 1;

        $objMP = new publicModel();
        $objB = new Bank();
        $objTAC = new TypeAccountCustomer();
        $objBeneficiaries = new Beneficiaries();


        $getTypeAccountCustomer = $objTAC->getTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);
        $getBanks = $objB->getBank();
        $dt = Carbon::now('Asia/Ho_Chi_Minh');

        $getBFs = $objBeneficiaries->getBeneficiaries('<>', $getTypeAccountCustomer->account->IDAccount);
        $checkElement = $getBFs->count();
        if ($checkElement == 0) {
            $checkElementActive = true;
        } else {
            $checkElementActive = false;
        }
        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);


        return view('private.transaction.outSystem.transactionOutSystem', compact('getDataTypeAccountCustomer', 'getBanks', 'getBFs', 'checkElementActive', 'dt'));

    }

    /**
     * showConfirmInfoTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postConfirmInfoTransactionOutSystem(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $validator = Validator::make($request->all(), [
            'accountNumber' => 'required',
            'nameBeneficiary' => 'required',
            'nameBank' => 'required',
            'branchBank' => 'required',
            'cityBank' => 'required',
            'money' => 'required',
            'contentTransaction' => 'required',
            'feePayers' => 'required',
        ], [
            'accountNumber.required' => 'accountNumber required',
            'nameBeneficiary.required' => 'nameBeneficiary required',
            'nameBank.required' => 'nameBank required',
            'branchBank.required' => 'branchBank required',
            'addressBank.required' => 'cityBank required',
            'money.required' => 'money required',
            'contentTransaction.required' => 'contentTransaction required',
            'feePayers.required' => 'transferPerson required',
        ]);
        if ($validator->fails()) {
            return redirect('private/transaction/OutSystem')->withErrors($validator)->withInput();;
        }
        $objMP = new publicModel();
        $objBank = new Bank();
        $objBF = new Beneficiaries();
        $objAccount = new Account();

        $valueIDCustomer = $request->session()->get('IDCustomer');
        $valueIDTypeAccount = 1;
        $getDataTypeAccountCustomer = $objMP->setTypeAccountCustomer($valueIDCustomer, $valueIDTypeAccount);
        $getDataBank = $objBank->setBank($request->nameBank, $request->branchBank);
        $getCheckBank = $objBank->checkBank($request->nameBank, $request->branchBank);

        if (!$getCheckBank) {
            Session::flash('error', 'Not the bank in system');
            return redirect('/private/transaction/OutSystem');
        }
        $codeTransaction = mt_rand(10000, 99999);
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $transaction = array(
            'idTypeAccountCustomer' => $getDataTypeAccountCustomer->IDTypeAccountCustomer,
            'idAccount' => $getDataTypeAccountCustomer->account->IDAccount,
            'nameAccount' => $getDataTypeAccountCustomer->customer->FirstName,
            'idBank' => $getDataBank->IDBank,
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
        $checkMoney = $objMP->compareMoney($transaction['money'], $getDataTypeAccountCustomer->account->IDAccount);

        if ($checkMoney) {
            if ($request->input('saveName')) {
                if ($objBF->checkBeneficiaries($transaction['accountNumber'])) {
                    $objBF->saveOutBeneficiaries($transaction['accountNumber'],
                        $transaction['nameBeneficiary'],
                        $getDataTypeAccountCustomer->account->IDAccount,
                        $getDataBank->IDBank);
                }
            }
            return view('private.transaction.outSystem.confirmInfoTransactionOutSystem', compact('transaction', 'getDataTypeAccountCustomer', 'getDataBank'));
        } else {
            Session::flash('error', 'The amount in the account is not enough');
            return redirect('/private/transaction/OutSystem');
        }

        /*        return view('private.transaction.outSystem.confirmInfoTransactionOutSystem');*/

    }

    /**
     * showReceiveCodeOTPOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postReceiveCodeOTPOutSystem(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $infoTransaction = $request->session()->get('transaction');

        $codeOTP = mt_rand(1000, 9999);
        session()->put('codeOTP', $codeOTP);
        Mail::send('component.Email', [
            'CodeOTP' => $codeOTP, 'Name' => $infoTransaction['nameAccount']
        ], function ($msg) {
            $msg->from('onlinebankingTreet@gmail.com');
            $msg->to('onlinebankingTreet@gmail.com');
            $msg->subject('Gữi mã otp ');
        });
        return view('private.transaction.outSystem.receiveCodeOTPOutSystem');

    }

    /**
     * showAlertsSuccessTransactionOutSystem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAlertsSuccessTransactionOutSystem(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        if ($request->input('codeOPT') == $request->session()->get('codeOTP')) {
            $transaction = $request->session()->get('transaction');
            $codeOTP = $request->session()->get('codeOTP');

            $addTransaction = new Transaction();

            $addTransaction->saveOutTransaction($transaction, $codeOTP);
            Mail::send('component.Transaction', [
                'accountSource' => $transaction['accountSource'],
                'nameAccount' => $transaction['nameAccount'],
                'money' => $transaction['money'],
                'accountNumber' => $transaction['accountNumber'],
                'nameBeneficiary' => $transaction['nameBeneficiary'],
                'dateTransaction' => $transaction['dateTransaction'],
                'codeTransaction' => $transaction['codeTransaction'],
                'contentTransaction' => $transaction['contentTransaction'],
            ], function ($msg) {
                $msg->from('onlinebankingTreet@gmail.com');
                $msg->to('onlinebankingTreet@gmail.com');
                $msg->subject('Thông tin giao dịch ');
            });
            $inforNotification = array(
                'accountSource' => $transaction['accountSource'],
                'nameAccount' => $transaction['nameAccount'],
                'money' => $transaction['money'],
                'accountNumber' => $transaction['accountNumber'],
                'nameBeneficiary' => $transaction['nameBeneficiary'],
                'dateTransaction' => $transaction['dateTransaction'],
                'codeTransaction' => $transaction['codeTransaction'],
                'contentTransaction' => $transaction['contentTransaction'],
            );
            $request->session()->forget('transaction');
            return view('private.transaction.inSystem.alertsSuccessTransactionInSystem', compact('inforNotification'));

        } else {
            Session::flash('error', 'The otp code you entered was wrong');
            return redirect('/private/transaction/InSystem/receive');
        }
    }

    /**
     * showReport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showReport(Request $request)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $objMP = new publicModel();
        $objTraction = new Transaction();
        $date = $request->input('date');
        if (isset($date)) {
            if ($date == 1) {
                $getDataTypeAccountCustomers = $objMP->getIDReport($request);
                $getDataHistoryTransactions = $objTraction->getYearHistoryTransaction($getDataTypeAccountCustomers);
                $totalCome = $objTraction->totalCome($getDataTypeAccountCustomers, 0);
                $totalDepart = $objTraction->totalCome($getDataTypeAccountCustomers, 1);
                $objNames = $objTraction->CountNameBeneficiaries($getDataTypeAccountCustomers);

                return view('private.report.reportPrivate', compact('getDataHistoryTransactions', 'totalCome', 'totalDepart', 'objNames'));

            } else {
                $getDataTypeAccountCustomers = $objMP->getIDReport($request);
                $getDataHistoryTransactions = $objTraction->getMonthHistoryTransaction($getDataTypeAccountCustomers);
                $totalCome = $objTraction->totalCome($getDataTypeAccountCustomers, 0);
                $totalDepart = $objTraction->totalCome($getDataTypeAccountCustomers, 1);
                $objNames = $objTraction->CountNameBeneficiaries($getDataTypeAccountCustomers);

                return view('private.report.reportPrivate', compact('getDataHistoryTransactions', 'totalCome', 'totalDepart', 'objNames'));

            }
        } else {
            $getDataTypeAccountCustomers = $objMP->getIDReport($request);

            $getDataHistoryTransactions = $objTraction->getHistoryTransaction($getDataTypeAccountCustomers);
            $totalCome = $objTraction->totalCome($getDataTypeAccountCustomers, 0);
            $totalDepart = $objTraction->totalCome($getDataTypeAccountCustomers, 1);
            $objNames = $objTraction->CountNameBeneficiaries($getDataTypeAccountCustomers);

            return view('private.report.reportPrivate', compact('getDataHistoryTransactions', 'totalCome', 'totalDepart', 'objNames'));

        }
    }

    public function printReport($checkOutCode)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printReportConvert($checkOutCode));
        return $pdf->stream();
    }

    /**
     * printReportConvert
     * @param $checkoutCode
     * @return mixed
     */
    public function printReportConvert($checkOutCode)
    {
        $objTransaction = new Transaction();
        $getData = $objTransaction->FindTransaction($checkOutCode);
        return view('component.report', compact('getData'));
    }

    /**
     * showSupport
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSupport($id)
    {
        if (empty(session()->get('IDCustomer'))) {
            return redirect('public');
        }
        $objSupport = new Support();
    $getData = $objSupport->getSupport($id);
        return view('private.support.supportPrivate',compact('getData'));
    }

    /**
     * logout
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        $request->session()->forget('IDCustomer');
        return redirect('public');
    }

}
