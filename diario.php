<?php
   $html = file_get_contents('https://www.soychile.cl/copiapo');
   $dom = new DOMDocument;
   @$dom->loadHTML($html);
   $imagenes = $dom->getElementsByTagName('img');
   $paginas = array();
   foreach ($imagenes as $imagen) {
     if (strpos($imagen->getAttribute('src'), '1440')!== false){
       array_push($paginas, $imagen->getAttribute('src'));
       // echo "<a href='". $imagen->getAttribute('src') ."'>" .$imagen->getAttribute('src') ."</a><br>";
     }
   }
   $ult_pag = substr($paginas[1], -18, 2);
   $cadena = substr($paginas[1], -10, 6);
   $str_pag = substr($paginas[1], 0, strlen($paginas[1])-18);
   for ($i=1; $i <= $ult_pag ; $i++) {
     $num_pag = ($i < 10 ? "0". $i : $i);
     $img_pag = $str_pag . $num_pag ."-1440-" . $cadena . ".jpg";
     echo "<img src='" . $img_pag . "'>";
   }
?>