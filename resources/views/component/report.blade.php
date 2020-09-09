<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/icon-web.png') }}" type="image/png">
    <title>Docusmet</title>
    <!-- Bootstrap CSS -->

</head>
<body>
<div class="container">
    <div class="py-5 text-center">
        <h1>OnlineBanking</h1>
        <p class="lead">Trusted and Safe</p>
    </div>

    <div>
        <div>
            <h3>Information</h3>
            <p>Banking : OnlineBanking</p>
            <p>Code Transaction: {{$getData->CodeTransaction}}</p>
        </div>
        <h2>Transaction slip</h2>
        <div class="card-body">
            <h5 class="card-title">Transfer person</h5>
            <p class="card-text font-weight-bold">Name :
                <span
                    class="font-weight-normal"> {{ $getData->typeAccountCustomer->first()->customer->LastName." ".$getData->typeAccountCustomer->first()->customer->FirstName  }}</span>
            </p>
            <p class="card-text font-weight-bold">Account :
                <span>{{ $getData->typeAccountCustomer->first()->account->AccountSourceNumber }}</span>
            </p>
            <h5 class="card-title">Beneficiaries</h5>
            <p class="card-text font-weight-bold">Name :<span
                    class="font-weight-normal"> {{ $getData->NameBeneficiaries }}</span></p>
            <p class="card-text font-weight-bold">Account :<span
                    class="font-weight-normal">{{ $getData->Beneficiaries }}</span></p>
            <p class="card-text font-weight-bold">Banking : <span
                    class="font-weight-normal">{{ $getData->bank->Name }}</span></p>
            <h5 class="card-title">Information Transaction</h5>
            <p class="card-text font-weight-bold">Date : <span
                    class="font-weight-normal">{{ $getData->TransactionDate }}</span></p>
            <p class="card-text font-weight-bold">Money transfer :<span class="font-weight-normal">{{ number_format($getData->TransactionMoneyNumber) }} VND</span>
            </p>
            <p class="card-text font-weight-bold">Content transaction : <span
                    class="font-weight-normal">{{ $getData->ContentTransaction }}</span>
            </p>
            <p class="card-text font-weight-bold">Free : <span class="font-weight-normal">{{ number_format( $getData->Fee) }} VND</span>
            </p>
        </div>
    </div>

</div>
</body>
</html>
