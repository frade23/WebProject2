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

function cart() {
    if (document.getElementById("logIn").innerText === "登录"){
        window.location.href = "Login.php";
    }
    else {
        window.location.href = "Cart.php";
    }
    return false;
}

function goToCart() {
    if (document.getElementById("logIn").innerText == "登录"){
        window.location.href = "Login.php";
    }
    else {
        $.ajax({
            url:"addToCart.php",
            data:{
                "title":document.getElementById("title").innerText,
                "name":document.getElementById("logIn").innerText},
            type:"get",
            success(msg){
                if(msg==="success"){
                    alert("添加成功");
                }else if (msg ==="defeat") {
                    alert("您已添加过该商品");
                }
            }
        })
    }
    return false;
}