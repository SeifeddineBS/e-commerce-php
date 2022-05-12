<?php



require_once '../controller/evenementc.php';
$evenetC = new EvenementC();
	$liste=$evenetC->Tri(); 

?>


<main class="main--container">
<section class="main--content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Modals Triggering</h3>
                    </div>

                    <div class="panel-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-cells-middle">
                                <thead class="text-dark">
                                  
                                    <tr>
                                    <th scope="col">Titre/th>
                    <th scope="col" >Description</th>
                    <th scope="col">Type/th>
                    <th scope="col">Lieu</th>
                    <th scope="col">Date</th>
                    <th scope="col">nbparticipant</th>
                    <th scope="col">image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
				foreach($liste as $evenet){
          ?>
                                    <tr>
                                                      <td><?php echo $evenet['idevent']; ?></td>
                    <td class="tm-product-name"><?php echo $evenet['Titre']; ?></td>
                    <td><?php echo $evenet['Lieu']; ?></td>
                    <td><?php echo $evenet['Date']; ?></td>
                    <td><?php echo $evenet['Description']; ?></td>
                    <td><?php echo $evenet['Type']; ?></td>
                    <td><?php echo $evenet['nbparticipant']; ?></td>
                    <td><?php echo $evenet['image']; ?></td>
                    
                   
                    
                    <td>
					<form method="POST" action="modifierevenement.php?id=<?php echo $evenet['idevent']; ?>">
						<input type="submit" name="Modifier" value="Modifier" class="btn btn-primary btn-block text-uppercase sm-1">
						<input type="hidden" value=<?PHP echo $evenet['idevent']; ?> name="idevent">
					</form>
				     </td>

                <td>
			
			
                    
                    </td>
				<td>
				<a href="supprimerevenement.php?id=<?php echo $evenet['idevent']; ?>"  class="tm-product-delete-link" >
				<i class="far fa-trash-alt tm-product-delete-icon"></i>
			</a>
			
                    
          </td>
                   
                                    </tr>
                                    <?php
				}
			?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
      </div>