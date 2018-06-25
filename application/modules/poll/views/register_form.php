<div class="container">
   <div class="row justify-content-center">
      <form class="col-md-5 mt-5" method="POST">
         <p class="h4 text-center mb-5">Registre-se para votar</p>

         <?= form_error('nome', '<p class="alert alert-danger">', '</p>'); ?>
         <div class="md-form">
            <i class="fa fa-user prefix grey-text"></i>
            <input type="text" name="nome" value="<?= set_value('nome'); ?>" class="form-control">
            <label for="nome">Nome</label>
         </div>

         <?= form_error('gu', '<p class="alert alert-danger">', '</p>'); ?>
         <div class="md-form">
            <i class="fa fa-lock prefix grey-text"></i>
            <input type="text" name="gu" value="<?= set_value('gu'); ?>" class="form-control">
            <label for="gu">G. U.</label>
         </div>

         <div class="text-center mt-4">
            <button class="btn btn-primary" type="submit">Votar</button>
         </div>
      </form>
   </div>
</div>