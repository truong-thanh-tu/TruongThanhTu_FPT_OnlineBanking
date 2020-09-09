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
                <h2 class="text-black text-uppercase " style="letter-spacing: 1px"> In OnLineBanking</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="jumbotron">
                        <form action="{{Route('PostInfoTransactionInSystem')}}" method="post">
                            @if ( Session::has('error') )
                                <div class="alert alert-danger alert-dismissible " role="alert">
                                    <ul>
                                        <li>
                                            {{ Session::get('error') }}
                                        </li>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                            @endif
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
                                                   value="{{ $getDataTypeAccountCustomer->account->AccountSourceNumber }}"
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
                                                   value="{{number_format($getDataTypeAccountCustomer->account->BalanceSource) }}  VND"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Beneficiary </h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Select an account in the list</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn alert-success dropdown-toggle w-50" href="#"
                                               id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false">Choose account transaction
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                                 style="letter-spacing: 1px!important;">
                                                @foreach($getDataBeneficiaries as $key => $getDB)
                                                    <p class="dropdown-item" onclick="myFunction{{ $key }}()"
                                                       id="btn1"><span
                                                            class="mr-2">{{$getDB->AccountBeneficiaries}}</span>
                                                        <span> {{$getDB->NameAccountBeneficiaries}}</span></p>
                                                @endforeach

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Account Number</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="accountBeneficiary" class="sr-only"></label>
                                            <input type="text" class="form-control w50"
                                                   name="accountNumber" value=""
                                                   id="accountBeneficiary">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Name Beneficiary</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="nameBeneficiary" class="sr-only"></label>
                                            <input type="text" class="form-control" name="nameBeneficiary"
                                                   id="nameBeneficiary" value="">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right"></td>
                                    <td>
                                        <div class="form-group form-check">
                                            <input type="checkbox" class="form-check-input" value="true" name="saveName"
                                                   id="exampleCheck1">
                                            <label class="form-check-label font-weight-normal"
                                                   for="exampleCheck1">Save</label>
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
                                            <label for="money" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="money"
                                                   id="money">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Content Transaction</td>
                                    <td>
                                        <div class="form-group">
                                            <textarea class="form-control w-50" name="contentTransaction"
                                                      id="message" rows="5"
                                                      placeholder="Enter Message"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Date</td>
                                    <td class="font-weight-normal"><span>{{ $dt->toDateString() }}</span></td>
                                </tr>
                                <tr class="pb-5">
                                    <td class=" text-right">Fee payers</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="feePayers"
                                                   id="inlineRadio1" value="1">
                                            <label class="form-check-label font-weight-normal" for="inlineRadio1">Transfer
                                                person</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="feePayers"
                                                   id="inlineRadio2" value="2">
                                            <label class="form-check-label font-weight-normal" for="inlineRadio2">Beneficiaries</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-right">
                                <button type="submit" class="submit_btn banner_btn">Submit</button>
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <script language="javascript">
        @foreach($getDataBeneficiaries as $key => $getDB)
        function myFunction{{ $key }}() {
            document.getElementById('accountBeneficiary').value = "{{$getDB->AccountBeneficiaries}}";
            document.getElementById('nameBeneficiary').value = "{{$getDB->NameAccountBeneficiaries}}";
        }
        @endforeach
    </script>
@endsection
