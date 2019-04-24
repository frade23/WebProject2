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

//删除商品
$(".del").click(function() {
    let a = $(this);
    $.ajax({
        url:"deleteArtwork.php",
        data:{
            "title":a.siblings(".title").text(),
            "name":document.getElementById("logIn").innerText},
        type:"get",
        success(msg){
            if(msg==="success"){
                alert("删除成功");
                window.location.href="Cart.php";
            }
        }
    });
    return false;
});

$(".sum").click(function () {
    $.ajax({
        url:"pay.php",
        data:{
            "name":document.getElementById("logIn").innerText,
            "price":document.getElementById("price").innerText,

        },
        type:"get",
        success(msg){
            if (msg ==="success"){
                alert("购买成功");
                window.location.href="Cart.php";
            }
            else if (msg ==="defeat"){
                alert("余额不足，请充值");
                window.location.href="Cart.php";
            }
        }
    })
});
