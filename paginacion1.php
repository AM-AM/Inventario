<?php 
$numero_pagina= numero_pagina($post_por_pagina,$conec);?>
<nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php if(pagina_actual() === 1){ ?>
      <li class="page-item disabled"><a class="page-link " href="#">Previous</a></li>
    <?php }else{ ?>
      <li class="page-item"><a class="page-link" href="administrador.php?p=<?php echo pagina_actual()-1  ?>">Previous</a></li>
    <?php };  ?>

    <?php for($i =1; $i <= $numero_pagina; $i++){  ?>
      <li class="page-item"><a class="page-link" href="administrador.php?p=<?php echo $i;  ?>"><?php echo $i;  ?></a></li>
    <?php };  ?>
  </ul>  
</nav>