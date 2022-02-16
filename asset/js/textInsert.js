
/**
 * @param {Object} $param 
 * {
 *  {HTMLElement} textarea
 *  {String} insertingText
 * }
 * 
 */
function insertText ($param) {

    const $textarea = $param.textarea;
    const $insertingText = $param.insertingText;

    const $formerText = $textarea.value;
    const $position = $textarea.selectionStart;

    const $before = $formerText.substr(0, $position);
    const $after = $formerText.substr($position);

    $textarea.value = $before + $insertingText + $after;

    // selectionStartじゃだめ？
    $textarea.selectionEnd = $position + $insertingText.length;
}