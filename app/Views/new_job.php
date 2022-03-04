<?php echo $this->extend( 'layouts/_main_layout' ); ?>

<?php echo $this->section( 'container' ); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 mt-5">
				<?php 
				    helper( 'form' );
				    echo form_open( 'main/cadastrar' );
				?>

				<div class="mb-3">
					<input type="text" name="job_name" class="form-control" required>
				</div>
				

				<div class="mb-3">
					<a href="<?php echo site_url('main'); ?>" class="btn btn-secondary">Cancelar</a>
					<input type="submit" value="Cadastrar" class="btn btn-primary float-end">
				</div>
				
				

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>

<?php echo $this->endSection(); ?>