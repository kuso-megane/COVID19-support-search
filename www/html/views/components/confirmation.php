<?php
    /*
     * class="confirmation--trigger"を押すと展開
     * form要素専用
     */
?>

<div id="confirmation" class="hidden">
    <p>本当に実行しますか？</p>
    <div id="confirmation--button-container">
        <input id="confirmation--submit-button" class="confirmation--buttons" type="submit" value="確認">
        <div id="confirmation--back-button" class="confirmation--buttons">戻る</div>
    </div>
</div>

<script>
    const confirmationTrigger = document.querySelector(".confirmation--trigger");
    const backButton = document.getElementById("confirmation--back-button");

    const confirmation = document.getElementById("confirmation");

    const showConfirmation = () => {
        confirmation.classList.remove("hidden");
    }

    const hiddenConfirmation = () => {
        confirmation.classList.add("hidden");
    }

    confirmationTrigger.addEventListener("click", showConfirmation);
    backButton.addEventListener("click", hiddenConfirmation);
</script>
