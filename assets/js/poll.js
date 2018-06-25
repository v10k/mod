$(document).ready(function(){

    $('input[id^="eval_"]').change(updateDisplay);

});

function updateDisplay() {
    id = this.id.substr(5);
    $('span#display_'+id).text(this.value);
}