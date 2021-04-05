
// 検索ボックスへの追従リンクの追従範囲を設定
const followingElementControl = () => {

    const element = document.getElementById("followingLink-to-searchbox");
    const trigger = document.getElementById("result--container");
    
    const screenTop = window.pageYOffset;
    const screenBottom = screenTop + window.innerHeight;
    const startY = screenTop + trigger.getBoundingClientRect().top;
    const endY = screenTop + trigger.getBoundingClientRect().bottom;

    if (scrollY > startY) {
        element.classList.remove("hidden");
        //element.classList.remove("absolute");
        element.classList.add("fixed");

        if (screenBottom > endY) {
            element.classList.remove("fixed");
            element.classList.add("hidden");
            //element.classList.add("absolute");
        }
    }
    else {
        element.classList.add("hidden");
    }
}

window.addEventListener("scroll", followingElementControl);

