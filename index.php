<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Drive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="mb-2">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Google Drive</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="modal fade" tabindex="-1" id="createfile" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nuevo archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="modal-create-button">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modal-create-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="modal-create-submit">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="modal-create-button">Cancelar</button>
          </div>
        </div>
      </div>
    </div>



    <div class="modal fade" tabindex="-1" id="editfile" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar archivo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="modal-edit-button">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modal-edit-body">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="modal-edit-submit">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" class="modal-edit-button">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <main class="container mx-auto">
        <div id="accordion"></div>
    </main>
</body>
<script src="https://kit.fontawesome.com/51dc2f886a.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./js/index.js"></script>
</html>
