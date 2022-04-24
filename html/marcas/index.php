<?php
use App\Marcas;

require dirname(__DIR__,2)."/vendor/autoload.php";

$datos=(new Marcas)->readAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inicio</title>
</head>

<body class="bg-primary">

<div class="container">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Info</th>
      <th scope="col">Nombre</th>
      <th scope="col">Pais</th>
      <th scope="col" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($datos as $item){



echo <<<TXT
    <tr>
      <th scope="row">{$item->id}</th>
      <td>{$item->nombre}</td>
      <td>{$item->pais}</td>
      <td>Acciones</td>
    </tr>
TXT;
}
?>
  </tbody>
</table>

</div>  
</body>
</html>