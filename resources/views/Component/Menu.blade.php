<div class="menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand icon" href="#"><i class="fas fa-university"></i></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ Route('InformationAccount') }}">Thông tin Tài Khoản/Thẻ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('InTransferBank') }}">Chuyển tiền</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('History') }}">Lịch sử</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('Report') }}">Báo cáo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ Route('Support') }}">Hỗ trợ</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>
