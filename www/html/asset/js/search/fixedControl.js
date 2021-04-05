
// 検索ボックスへの追従リンクの追従範囲を設定
const fixedControl = () => {

    const element = document.getElementById("nav-to-searchbox");
    const start = document.getElementById("result--container");
    //const end = document.getElementById("");
    
    const scrollY = window.pageYOffset;
    const startY = scrollY + start.getBoundingClientRect().top;
    const endY = scrollY + end.getBoundingClientRect().top;

    if (scrollY > startY && scrollY < endY) {
        element.classList.add("fixed");
    }
    else {
        element.classList.remove("fixed");
    }
}

window.addEventListener("click", fixedControl);

