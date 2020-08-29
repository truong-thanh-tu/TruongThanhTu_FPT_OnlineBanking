@extends('layout.layoutPrivate')
@section('title','AccountInfor')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Transfers</h2>
                    <div class="page_link">
                        <a> Out Transfers</a>
                        <a>Information</a>
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
                <h2 class="text-black text-uppercase " style="letter-spacing: 1px"> Out OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="jumbotron">
                        <form action="{{Route('confirmInfoTransactionOutSystem')}}">
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
                                                   value="1234659793131" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Balance</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="balance" id="inputPassword2"
                                                   value="5.000.000" disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Beneficiary </h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Account Number</td>
                                    <td>
                                        <div class="input-group w-50">
                                            <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                                <option >Choose Banking</option>
                                                <option value="1"> UHBanking  Da Nang Viet Nam</option>
                                                <option value="1">UHBanking</option>
                                                <option value="1">UHBanking</option>
                                                <option value="1">UHBanking</option>
                                                <option value="1">UHBanking</option>
                                                <option value="1">UHBanking</option>
                                                <option value="1">UHBanking</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr> <tr>
                                    <td class="text-right">Account Number</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="accountNumberBeneficiary"
                                                   id="inputPassword2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Name Beneficiary</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="nameBeneficiary"
                                                   id="inputPassword2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right"></td>
                                    <td>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label font-weight-normal" value="true"
                                                   for="exampleCheck1">Save beneficiary information </label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Transaction</h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Money</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="money"
                                                   id="inputPassword2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Content Transaction</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control w-50" name="message" name="contentTransaction"
                                                      id="message" rows="5"
                                                      placeholder="Enter Message"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Date</td>
                                    <td class="font-weight-normal"><span>2020-02-03</span></td>
                                </tr>
                                <tr class="pb-5">
                                    <td class=" text-right">Fee payers</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="transferPerson"
                                                   id="inlineRadio1" value="option1">
                                            <label class="form-check-label font-weight-normal" for="inlineRadio1">Transfer
                                                person</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="beneficiaries"
                                                   id="inlineRadio2" value="option2">
                                            <label class="form-check-label font-weight-normal" for="inlineRadio2">Beneficiaries</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-right">
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
