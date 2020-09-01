@extends('layout.layoutPrivate')
@section('title','Transfers | In System')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Transfers</h2>
                    <div class="page_link">
                        <a> In System</a>
                        <a>Confirm Information </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area p_120">
        <div class="container">
            <div class="row">
                <h2 class="text-black text-uppercase " style="letter-spacing: 1px"> In OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="jumbotron">
                        <form action="{{ Route('receiveOTPInSystem') }}">
                            <table class="table bg-white table-borderless font-weight-bold">
                                <tr>
                                    <td><h4>Information Transfer </h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right ">Account Number Source</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="accountNumberSource"
                                                   id="inputPassword2"
                                                   value=" {{ $getDataTypeAccountCustomer->account->AccountSourceNumber}}"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Balance</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="balance" id="inputPassword2"
                                                   value="{{number_format($getDataTypeAccountCustomer->account->BalanceSource) }} VND"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Beneficiary </h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Account Number</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="accountNumberBeneficiary"
                                                   value="{{$transaction['accountNumber']}}" id="inputPassword2"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Name Beneficiary</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="nameBeneficiary"
                                                   value="{{$transaction['nameBeneficiary']}}" id="inputPassword2"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Transaction</h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Money</td>
                                    <td style="height: 50px !important;">
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="money"
                                                   value="{{number_format($transaction['money'])}} VND"
                                                   id="inputPassword2" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Date</td>
                                    <td class="font-weight-normal"><span>{{$transaction['dateTransaction']}}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Amount is equal to letters</td>
                                    <td class="font-weight-normal">
                                        <span>{{number_format($transaction['money'])}} chuyen sang kieu chu</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Content Transaction</td>
                                    <td class="font-weight-normal"><span>{{$transaction['contentTransaction']}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Payer Fee</td>
                                    <td class="font-weight-normal">
                                        <span> {{($transaction['feePayer'] == 1)?'Transfer person':'Beneficiaries'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Fees</td>
                                    <td class="font-weight-normal text-danger"><span> {{number_format($transaction['fee']) }} VND</span></td>
                                </tr>
                                <tr class="mb-2">
                                    <td class="text-right">Email receive email code</td>
                                    <td class="font-weight-normal"><span>{{$getDataTypeAccountCustomer->customer->Email}}</span></td>
                                </tr>
                            </table>
                            <div class="text-right">
                                <a href="{{ Route('GetInfoTransactionInSystem') }}"
                                   class="submit_btn banner_btn">Back</a>
                                <button type="submit" class="submit_btn banner_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
