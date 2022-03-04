<?php echo $this->extend( 'layouts/_main_layout' ); ?>

<?php echo $this->section( 'container' ); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">
				<h3>Editar tarefa</h3>
				<?php 
				    helper( 'form' );
				    echo form_open( 'main/editar' );
				?>

				<div class="mb-3">
					<input type="text" name="job_name" class="form-control" value="<?php echo $job['job']; ?>" required>
				</div>

				<input type="hidden" name="job_id" value="<?php echo intval( $job['id'] ); ?>">
				

				<div class="mb-3">
					<a href="<?php echo site_url('main'); ?>" class="btn btn-secondary">Cancelar</a>
					<input type="submit" value="Atualizar" class="btn btn-primary float-end">
				</div>
				
				

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

<?php echo $this->endSection(); ?>