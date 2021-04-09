<script>
    /*
     * 呼び出し元の、class="confirmation--trigger"の要素(button要素を想定)を押すと展開
     * type, text, data-on-clickを代行
     * 
     * note: eval使っちゃっているので、BY以外使わないほうがいいかも
     */
</script>

<div class="confirmation">
    <p class="confirmation--note">本当に実行しますか</p>
    <div class="confirmation--button-container">
        <div class="confirmation--main-button confirmation--buttons"></div>
        <div class="confirmation--back-button confirmation--buttons">戻る</div>
        
    </div>
</div>


<script>
        
    const confirmationTriggers = document.querySelectorAll(".confirmation--trigger");

    const confirmation = document.querySelector(".confirmation");
    const mainButton = document.querySelector(".confirmation--main-button");
    const backButton = document.querySelector(".confirmation--back-button");
    let onClick; //もとのボタンのクリックイベントリスナー関数名

    const showConfirmation = (e) => {
        e.preventDefault();
        const targetElement = e.target;
        const type = targetElement.type;
        const textContent = targetElement.textContent;
        onClick = eval(targetElement.getAttribute("data-on-click"));
        
        if (type != undefined) {
            mainButton.setAttribute("type", type);
        }
        mainButton.textContent = textContent;
        if (onClick != undefined) {
            mainButton.addEventListener("click", onClick); //hiddenConfirmationより先に発火しないとダメ
        }
        mainButton.addEventListener("click", hiddenConfirmation);
        backButton.addEventListener("click", hiddenConfirmation); 
        
        confirmation.classList.add("show");
    }

    const hiddenConfirmation = (e) => {

        if (mainButton.hasAttribute("type")) {
            mainButton.removeAttribute("type");
        }
        
        mainButton.textContent = '';
        if (onClick != undefined) {
            mainButton.removeEventListener("click", onClick);
        }
        confirmation.classList.remove("show");
    }

    for(const element of confirmationTriggers) {
        element.addEventListener("click", showConfirmation);
    }
</script>
