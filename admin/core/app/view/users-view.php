<div class="row">
	<div class="col-md-12">
	<a href="index.php?view=newuser" class="btn btn-default pull-right"><i class='glyphicon glyphicon-user'></i> Nuevo Usuario</a>
		<h1>Lista de Usuarios</h1>
<br>
		
		<?php
		$currentUser = UserData::getById($_SESSION['admin_id']);
		$users = UserData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Nombre completo</th>
			<th>Usuario</th>
			<th>Email</th>
			<th>Activo</th>
			<th>Admin</th>
			<?php if( $currentUser->desarrollador ): ?>
			<th>Dev</th>
			<?php endif; ?>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				$show = $currentUser->desarrollador || !$user->desarrollador;
				if( $show ){
				?>
				<tr>
				<td><?php echo $user->nombre." ".$user->apellidos; ?></td>
				<td><?php echo $user->nombre_usuario; ?></td>
				<td><?php echo $user->email; ?></td>
				<td>
					<?php if($user->activo):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<td>
					<?php if($user->administrador):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<?php if( $show ): ?>
				<td>
					<?php if($user->desarrollador):?>
						<i class="glyphicon glyphicon-ok"></i>
					<?php endif; ?>
				</td>
				<?php endif; ?>
				
				<td style="width:120px;">
				<a href="index.php?view=edituser&id=<?php echo $user->id;?>" class="btn btn-warning btn-xs">Editar</a>
				<a href="index.php?action=deluser&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</td>
				</tr>
				<?php
				}
			}
			?>
			</table>
			<?php
		}else{
			// no hay usuarios
		}


		?>


	</div>
</div>