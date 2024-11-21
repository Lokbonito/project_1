    const plus = document.querySelector(".plus"),
        minus = document.querySelector(".minus"),
        num = document.querySelector(".num"),
        amount_prod = document.querySelector("#amount_prod");
    let a = 1;
    if(num) {
        a = Number(num.innerHTML);
    }
    plus.addEventListener("click", () => {
        a++;
        a = (a < 10) ? "0" + a : a;
        num.innerHTML = a;
        if(amount_prod) {
            amount_prod.value = a;
        }
    });

    minus.addEventListener("click", () => {
        if (a > 1) {
            a--;
            a = (a < 10) ? "0" + a : a;
            num.innerHTML = a;
        if(amount_prod) {
            amount_prod.value = a;
        }}
    });