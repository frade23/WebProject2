function logIn() {
    if (document.getElementById("logIn").innerText === "登录"){
        window.location.href = "Login.php";
    }
    else {
        window.location.href = "Check.php";
    }
    return false;
}

function logOut() {
    if (document.getElementById("logOut").innerText ==="注册"){
        window.location.href = "Register.php";
    }
    else {
        window.location.href = "Home.php?$login=false";
    }
    return false;
}

$("#button2").click(function () {
    $.ajax({
        url:"recharge.php",
        data:{
            "name":document.getElementById("logIn").innerText,
            "balance":document.getElementById("balance").innerText,
            "add":document.getElementById("add").value,
        },
        type:"get",
        success(msg){
            if (msg ===1){
                alert(document.getElementById("add").value);
                alert(document.getElementById("logIn").innerText);
                alert(document.getElementById("balance").innerText);
                alert("充值成功");
                window.location.href="Check.php";
            }
            else if (msg===0){
                alert("充值失败");
            }
        }
    })
});

