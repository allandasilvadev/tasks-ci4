<?php echo $this->extend( 'layouts/_main_layout' ); ?>

<?php echo $this->section( 'container' ); ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<h3 class="p-3">Todo list</h3>
			</div>

			<div class="col text-end">
				<a href="<?php echo site_url( 'main/new_job' ); ?>" class="mt-3 btn btn-primary">
					Criar uma nova tarefa ...
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<?php if ( sizeof( $jobs ) == 0 ) { ?>
		            <p class="text-center">
						Não foram encontradas tarefas.
					</p>
				<?php } else { ?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Tarefa</th>
								<th class="text-center">Data de criação</th>
								<th class="text-center">Data de finalização</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $jobs as $job ) { ?>
							<tr>
								<td><?php echo $job['job']; ?></td>
								<td class="text-center">
									<?php echo date( 'd-m-Y H:i:s', strtotime( $job['created_at'] ) ); ?>
								</td>
								<td class="text-center">
									<?php echo $job['finished_at']; ?>
								</td>
								<td>
									<?php if ( empty( $job['finished_at'] ) ) { ?>
										<a href="<?php echo site_url( 'main/jobdone/' . $job['id'] ); ?>" class="btn btn-success mx-1">
											<i class="fa fa-fw fa-check" aria-hidden="true"></i>
											&nbsp;Concluir
										</a>
									<?php } else { ?>
										<a href="" class="btn btn-success disabled mx-1">
											<i class="fa fa-fw fa-check" aria-hidden="true"></i>
											&nbsp;Concluir
										</a>
									<?php } ?>


									<?php if ( empty( $job['finished_at'] ) ) { ?>
										<a href="<?php echo site_url( 'main/edit_job/' . $job['id'] ); ?>" class="btn btn-primary mx-1">
											<i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
											&nbsp;Editar
										</a>
									<?php } else { ?>
										<a href="" class="btn btn-primary disabled mx-1">
											<i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
											&nbsp;Editar
										</a>
									<?php } ?>

									<a href="<?php echo site_url( 'main/deletejob/' . $job['id'] ); ?>" class="btn btn-danger mx-1">
										<i class="fa fa-fw fa-trash" aria-hidden="true"></i> Deletar
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>

					<p>Nº de tarefas: <strong><?php echo sizeof( $jobs ); ?></strong></p>
				<?php } ?>
			</div>
		</div>			
	</div>
	
	

	
	
<?php echo $this->endSection(); ?>