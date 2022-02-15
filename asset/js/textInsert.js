
/**
 * @param {HTMLElement} $textarea
 * @param {String} $insertedText
 */
function insertText ($textarea, $insertedText) {

    const $formerText = $textarea.value;
    const $position = $textarea.selectionStart;

    const $before = $formerText.substr(0, $position);
    const $after = $formerText.substr($position);

    $textarea.value = $before + $insertedText + $after;

    // selectionStartじゃだめ？
    $textarea.selectionEnd = $position + $insertedText.length;
}