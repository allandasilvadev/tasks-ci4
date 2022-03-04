<?php echo $this->extend( 'layouts/_main_layout' ); ?>

<?php echo $this->section( 'container' ); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">

				<div class="mb-3">
					<h4>Deseja eliminar a tarefa ?</h4>

					<div class="card p-3 my-3 bg-light">
						<p><?php echo $job['job']; ?></p>
					</div>
				</div>
				

				<div class="mb-3">
					<a href="<?php echo site_url('main'); ?>" class="btn btn-secondary">Não</a>
					<a href="<?php echo site_url( 'main/deletejobconfirm/' . $job['id'] ); ?>" class="btn btn-primary float-end">
						Sim
					</a>
				</div>
				
			</div>
		</div>
	</div>

<?php echo $this->endSection(); ?>