/* 
    id="xxx-tab"要素がactiveになったとき、id="xxx-tab-content"要素がshow状態になる
    class="tab"のクリックイベントに対し発火。
*/


const tabs = document.getElementsByClassName("tab");

const changeTab = (e) =>  {
    const tab = e.target;
    // activeでないtabがクリックされたときのみ、処理を実行
    if (tab.classList.contains("active") == false) {
        oldActive = document.getElementsByClassName("active")[0];
        oldActive.classList.remove("active");
        oldShow = document.getElementsByClassName("show")[0];
        oldShow.classList.remove("show");

        tab.classList.add("active");
        const newShowId = tab.id + "-content";
        const newShow = document.getElementById(newShowId);
        newShow.classList.add("show");
    }
}


for(let i = 0; i < tabs.length; ++i) {
    const tab = tabs[i];
    tab.addEventListener("click", changeTab);
}
