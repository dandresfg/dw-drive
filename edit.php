<?php
if(isset($_GET['content'])){
    $url = __DIR__."/public"."/".$_GET['content'];
    file_put_contents($url, ltrim($_POST['text']));
    return http_response_code(200);
} else if(!isset($_GET['dir'])){
    header('index.php');
}
$url = __DIR__."/public"."/".$_GET['dir'];
$file = file_get_contents($url);

if(!$file){
    $file = "";
}

$title = explode('/', $url);
$title = $title[count($title)-1];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <form id="form-edit-content" class="p-4">
            <input type="hidden" id="url-content" value="<?php echo $_GET['dir'] ?>" />
            <input type="text" id="title-content" disabled="true" class="form-control" value="<?php echo $title ?>" />
            <div class="content" id="edit-content" contenteditable="true"><?php echo "".$file ?></div>
            <div class="content-btn">
                <button type="button" class="btn btn-secondary btn-md mx-2" id="cancelar">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-primary btn-md">
                    Guardar
                </button>
            </div>
        </form>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="./js/edit.js"></script>
</html>
