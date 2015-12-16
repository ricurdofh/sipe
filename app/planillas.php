<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Solicitud</div>
				<div class="panel-body" align="center">
					<embed src="planilla.php?id=<?php echo $_GET['id']; ?>&type=<?php echo $_GET['type'] ? $_GET['type'] : "solicitud"; ?>#toolbar=1&navpanes=0&scrollbar=1" type="application/pdf" width="900" height="600"></embed>
				</div>
			</div>
		</div>
	</div>
</div>   