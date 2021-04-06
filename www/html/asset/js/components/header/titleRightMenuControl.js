{
    const showTrigger = document.getElementById("title--right--menu");
    const closeTrigger = document.getElementById("close");

    const menuControl = (e) => {
        const menu = document.getElementById("title--right--menu--content");
        const target = e.currentTarget;
        const targetId = target.id;
        const showTriggerId = showTrigger.id;
        const closeTriggerId = closeTrigger.id;

        if (targetId == showTriggerId) {
            menu.classList.add("show");
        }
        else if(targetId == closeTriggerId) {
            menu.classList.remove("show");
        }
        else {
            return;
        }
    }

    showTrigger.addEventListener("click", menuControl);
    closeTrigger.addEventListener("click", menuControl);
}


