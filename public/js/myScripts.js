/**
 Truong Thanh Tu | 20:00 21-08-2020
 */

/**
 1./ Account
 a./ Login
 */

/**
 =================================================
 */

/**
 Login Section Begin
 */

/**
 * Hàm đổi màu của nut đăng nhập
 */

 function btnLogin(){
     document.getElementById("btn_login").style.background="#005395";
 }

/**
 * Hàm tạo mã kiểm tra
 */
function getCodeCheck() {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    document.getElementById('codeCheck').innerHTML = text;
}



