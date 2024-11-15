<?php
// Dados simulados de imagens no formato JSON
$imagens = [
    "animals" => [
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2017/02/20/18/03/cat-2083492_960_720.jpg", "name" => "Gato"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2018/01/28/12/37/penguin-3112331_960_720.jpg", "name" => "Pinguim"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2016/02/10/16/37/cat-1192026_960_720.jpg", "name" => "Gato 2"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2015/08/06/17/23/raccoon-879488_960_720.jpg", "name" => "Guaxinim"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2014/08/26/15/28/lion-428177_960_720.jpg", "name" => "Leão"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2018/05/09/21/05/bird-3385271_960_720.jpg", "name" => "Pássaro"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2015/06/08/15/18/tiger-801609_960_720.jpg", "name" => "Tigre"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2017/05/18/13/32/giraffe-2320562_960_720.jpg", "name" => "Girafa"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2017/09/07/08/54/elephant-2726022_960_720.jpg", "name" => "Elefante"],
        ["imagemUrl" => "https://cdn.pixabay.com/photo/2016/11/22/21/42/primate-1853558_960_720.jpg", "name" => "Macaco"]
    ]
];

// Determina qual página de imagens carregar
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$itensPorPagina = 3; // número de imagens por página
$inicio = ($pagina - 1) * $itensPorPagina;

// Seleciona as imagens para a página atual
$imagensPagina = array_slice($imagens['animals'], $inicio, $itensPorPagina);

// Retorna as imagens no formato JSON
echo json_encode(['animals' => $imagensPagina]);
?>
