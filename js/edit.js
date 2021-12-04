function replaceAll(str, find, replace) {
  return str.replace(new RegExp(find, 'g'), replace);
}

function onBack(){
    window.location.replace("https://dw-notepad.herokuapp.com/index.php");
}
function onSubmit(evt){
    evt.preventDefault();
    const { innerHTML } = document.getElementById('edit-content');
    const url = document.getElementById('url-content').value;
    $.ajax({
        type: 'POST',
        url: 'edit.php?content='+url,
        data: {
            text: replaceAll(replaceAll(innerHTML, '<div>', "\n"), '</div>', '')
        },
    })
    .done(onBack)
    .fail(onBack);
}

document.getElementById('form-edit-content').addEventListener('submit', onSubmit);
document.getElementById('cancelar').addEventListener('click', onBack);
