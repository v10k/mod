<div class="container">
   <div class="card pt-3 pl-3 mt-4 mb-4">
      <h4 class="blue-text">Eleitor: <?= $user->nome ?></h4>
      <h5 class="grey-text">GU: <?= $user->gu ?></h5>
   </div>

   <p class="alert alert-info">Atribua uma nota a cada um dos candidatos abaixo</p>
   <form method="post" class="mb-5">
      <div class="card-deck"><?= $cards ?></div>
      <button type="submit" class="btn btn-light-blue btn-md">Registrar Voto</button>
   </form>
</div>