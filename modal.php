
<?php
global $item;
echo "<!-- Modal -->
<div class='modal fade' id='deletemodal' data-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Etes vous sur de vouloir supprimer ce fichier ?
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Non</button>
                  <form action='' method='post'>
                  <input type='hidden' value='$item'  name='delete'>
        <button type='submit' name='delete' class='btn btn-primary'>Oui</button>
      </form>
      </div>
    </div>
  </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='copymodal' data-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Etes vous sur de vouloir copier ce fichier ?
      </div>
      <div class='modal-footer'>
        <form class='' for='' action='' method='post'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Non</button>
                  <form id='formcopy' for='copy_file' action='' method='post'>
        <button type='submit' class='btn btn-primary'>Oui</button>
      </form>
      </div>
    </div>
  </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='cutmodal' data-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Etes vous sur de vouloir couper ce fichier ?
      </div>
      <div class='modal-footer'>
        <form class='' for='' action='' method='post'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Non</button>
                  <form id='formcut' for='cut_file' action='' method='post'>
        <button type='submit' class='btn btn-primary'>Oui</button>
      </form>
      </div>
    </div>
  </div>
</div>";
echo "<!-- Modal -->
<div class='modal fade' id='pastemodal' data-backdrop='static' tabindex='-1' role='dialog' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        Etes vous sur de vouloir coller ce fichier ?
      </div>
      <div class='modal-footer'>
        <form class='' for='' action='' method='post'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Non</button>
                  <form id='formpaste' for='paste_file' action='' method='post'>
        <button type='submit' class='btn btn-primary'>Oui</button>
      </form>
      </div>
    </div>
  </div>
</div>";
