@extends('layout.layoutPrivate')
@section('title','Transfers  | Out System')
@section('content')


    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content">
                    <h2>Transfers</h2>
                    <div class="page_link">
                        <a> Out System</a>
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
                        <form action="{{Route('confirmInfoTransactionOutSystem')}}" method="post">
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
                                                   value="{{ number_format($getDataTypeAccountCustomer->account->BalanceSource) }} VND"
                                                   disabled>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4>Information Beneficiary </h4></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Select list beneficiaries</td>
                                    <td>
                                        <div class="input-group w-100">
                                            <div class="btn-group">
                                                <a class="btn alert-success dropdown-toggle "style=" width: 337.6px !important;" href="#"
                                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">Choose account transaction
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                                    @if($checkElementActive)
                                                        <a class="dropdown-item">
                                                            <p>
                                                                <span>No results were found</span>
                                                            </p>
                                                        </a>

                                                    @else
                                                        @foreach($getBFs as $key => $getBF)
                                                            <a class="dropdown-item">
                                                                <p onclick="myFunctionBeneficiaries{{ $key }}()">
                                                                    <span class="mr-2">{{ $getBF->bank->Name }}</span>
                                                                    <span
                                                                        class="mr-2">{{ $getBF->NameAccountBeneficiaries }}</span>

                                                                    <span
                                                                        class="mr-2">{{ $getBF->AccountBeneficiaries }}</span>
                                                                </p>
                                                            </a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Select Bank</td>
                                    <td>
                                        <div class="input-group w-100">
                                            <div class="btn-group">
                                                <a class="btn alert-success dropdown-toggle w-100"  style=" width: 337.6px !important;" href="#"
                                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                   aria-expanded="false">Choose bank
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                                    @foreach($getBanks as $key => $getBank)
                                                        <a class="dropdown-item">
                                                            <p
                                                                onclick="myFunctionBank{{ $key }}()"><span
                                                                    class="mr-5">{{ $getBank->Name }}</span>
                                                                <span class="mr-5">{{ $getBank->City }}</span>
                                                                <span class="mr-2">{{ $getBank->Address }}</span>
                                                            </p>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right">Account Number</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control w50" name="accountNumber"
                                                   id="accountNumber">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Name Beneficiary</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="nameBeneficiary"
                                                   id="nameBeneficiary">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Name Banking</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="nameBank" value=""
                                                   id="nameBank">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">Branch</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="branchBank" value=""
                                                   id="branchBank">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" text-right">City</td>
                                    <td>
                                        <div class="form-group w-50">
                                            <label for="inputPassword2" class="sr-only"></label>
                                            <input type="text" class="form-control" name="cityBank" value=""
                                                   id="addressBank">
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
        @foreach($getBanks as $key => $getBank)
        function myFunctionBank{{$key }}() {
            document.getElementById('nameBank').value = "{{ $getBank->Name }}";
            document.getElementById('branchBank').value = "{{ $getBank->City }}";
            document.getElementById('addressBank').value = "{{ $getBank->City ." ".$getBank->Address}}";
        }
        @endforeach
        @foreach($getBFs as $key => $getBF)
          function myFunctionBeneficiaries{{$key }}() {
            document.getElementById('accountNumber').value = "{{ $getBF->AccountBeneficiaries }}";
            document.getElementById('nameBeneficiary').value = "{{ $getBF->NameAccountBeneficiaries }}";
            document.getElementById('nameBank').value = "{{ $getBF->bank->Name }}";
            document.getElementById('branchBank').value = "{{$getBF->bank->City  }}";
            document.getElementById('addressBank').value = "{{ $getBF->bank->City ." ".$getBF->bank->Address}}";
        }
        @endforeach

    </script>
@endsection
