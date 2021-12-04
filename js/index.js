window.onload = function(){
  getFiles();
  document.querySelector("#modal-create-submit").onclick = onSubmitModal;
  document.querySelector("#modal-edit-submit").onclick = onSubmitEdit;
};

function getFiles(){
  $.ajax({ type: 'GET', url: 'dirs.php' })
  .done(html)
  .fail(console.log)
  .always(function(){
    for (let e of document.querySelectorAll(".modal-create-button")) {
      e.onclick = onCloseModal
    }
    for (let e of document.querySelectorAll(".modal-edit-button")) {
      e.onclick = onCloseModal
    }
  });
}

const state = {
  folder: null
};
const getState = (key) => state[key];
const setState = (key, value) => state[key] = value;

function html(data){
    $("#accordion").html(insert({root: data}, '', true))
    for (let e of document.querySelectorAll(".plus-icon")) {
      e.onclick = onOpenModal({folder: e.getAttribute("data-label"), url: e.getAttribute("data-uri")});
    }
    for (let e of document.querySelectorAll(".pencil-icon")) {
      e.onclick = onOpenEdit({folder: e.getAttribute("data-label"), url: e.getAttribute("data-uri")});
    }
    for (let e of document.querySelectorAll(".delete-icon")) {
      e.onclick = onDeleteFolder({folder: e.getAttribute("data-label"), url: e.getAttribute("data-uri")});
    }
}

function insert(data, link, isroot){
    return Object.keys(data).map(key => {
        const item = data[key];
        if(item && item.length){
            return append(item, link)
        } else {
            return bigAppend(key, item, link, isroot)
        }
    }).join('')
}

function onDeleteFolder({ folder, url }){
  return function eventClick(evt){
      $.ajax({ type: 'POST', url: 'destroy.php?isfolder=1', data: { uri: url } })
      .fail(console.log)
      .always(function(){
        setTimeout(getFiles, 300)
      })
  }
}

function onOpenEdit({ folder, url }){
  return function eventClick(evt){
    setState('folder', folder);
    setState('url', url);
    $('#editfile').modal('show')
    $("#modal-edit-body").html(`
      <div class="form-group">
        <label for="edit-file-name">Nombre</label>
        <input type="text" id="edit-file-name" class="form-control" placeholder="Nombre" value="${folder}">
        <small class="form-text text-muted">Solo usar caracteres alfanumericos.</small>
      </div>
    `)
  }
}

/* Create modal */
function onOpenModal({ folder, url }){
  return function eventClick(evt){
    setState('folder', folder);
    setState('url', url);
    $('#createfile').modal('show')
    $("#modal-create-body").html(`
      <div class="form-group">
        <label for="create-file-name">Nombre</label>
        <input type="text" id="create-file-name" class="form-control" placeholder="Nombre">
        <small class="form-text text-muted">Solo usar caracteres alfanumericos.</small>
      </div>
      <div class="form-check mt-4">
        <input class="form-check-input" type="checkbox" value="" id="create-file-checkbox">
        <label class="form-check-label" for="create-file-checkbox">
          Es una carpeta
        </label>
      </div>
    `)
  }
}

function onCloseModal(){
  setState('folder', null)
  setState('url', null)
  $('#createfile').modal('hide')
  $('#editfile').modal('hide')
  $('#create-file-name').val("")
  $('#edit-file-name').val("")
}

function onSubmitEdit(){
  const value = $('#edit-file-name').val().trim().replace('/./g', '');
  const oldfolder = getState('folder');

  onCloseModal();
  if( !value.length || (value === oldfolder) ) return;

  console.log({ uri: value, olduri: oldfolder })

  $.ajax({
      type: 'POST',
      url: 'rebase.php?isfolder=1',
      data: { uri: value, olduri: oldfolder },
  })
  .always(function(){
    setTimeout(getFiles, 300)
  })
}

function onSubmitModal(){
  const value = $('#create-file-name').val().trim().replace('/./g', '');
  const isFolder = $('#create-file-checkbox').prop('checked');
  const folder = getState('url')

  onCloseModal();
  if(!value.length || folder === undefined) return;

  $.ajax({
      type: 'POST',
      url: 'create.php?isfolder='+(isFolder ? 1 : 2),
      data: { uri: folder + '/' + value + (isFolder ? '' : '.txt') },
  })
  .always(function(){
    setTimeout(getFiles, 300)
  })
}

function bigAppend(txt, data, link, isroot){
    const url = (link+'/'+txt).replace('/root', '');
    return `
        <ul>
            <li class="folder">
                <div class="folter-container">
                    <span>${txt}</span>
                    <div>
                      <span class="icon plus-icon" data-label="${txt}" data-uri="${url}"><i class="fas fa-plus"></i></span>
                      ${isroot ? '' :`<span class="icon delete-icon" data-label="${txt}" data-uri="${url}"><i class="fas fa-trash"></i></span>`}
                    </div>
                </div>
            </li>
            <div class="ms-4">
                ${insert(data, url)}
            </div>
        </ul>
    `
}

function append(txt, link){
    return `
        <ul class="ms-4 article">
            <li><a href="edit.php?dir=${(link + "/" + txt).slice(1)}">${txt}</a></li>
        </ul>
    `
}
