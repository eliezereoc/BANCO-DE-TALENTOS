
<!--Mordal excluir-->
<div class="modal" id="delete-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Excluir Curriculo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir o curriculo de <strong><?php echo $candidato['nome']; ?> </strong> ?</p>
      </div>
      <div class="modal-footer">
        <a id="confirm" class="btn btn-outline-danger" href="delete.php?id=<?php echo $candidato['id']; ?>">Sim</a>
        <a id="cancel" class="btn btn-outline-secondary" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div>



