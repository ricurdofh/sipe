 <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Bienvenido : <?php echo $_SESSION['NombreUserLoginSystem']; ?></h4>

                </div>

            </div>
        
            <div class="row">
            
            
            
             <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-desktop dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                           
</div>
                         <h5>Total de Equipos = 
				<?php
									
				$Query = mysql_query("SELECT sum(cantidad_eq) as total FROM equipos");
				 $Cuenta = mysql_fetch_array($Query);
				 echo $Cuenta['total'];
				?> 
									
						</h5>
                    </div>
                </div>
                 <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-check-circle-o dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                           
</div>
                         <h5>Equipos en Prestamo = 
                         <?php
									
				$Query = mysql_query("SELECT sum(cantidad_apr) as total FROM solicitud_aprobada");
				 $Cuenta = mysql_fetch_array($Query);
				 echo $Cuenta['total'];
				?> 
                         </h5>
                    </div>
                </div>
                 <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                           
</div>
                         <h5>Equipos en Mantenimiento = 
                           <?php
									
				$Query = mysql_query("SELECT sum(cantidad_man) as total FROM mantenimiento");
				 $Cuenta = mysql_fetch_array($Query);
				 echo $Cuenta['total'];
				?> </h5>
                    </div>
                </div>
               

            </div>
             </div>   
     