<div class="alert alert-soft-info mb-lg-32pt">
    <div class="d-flex flex-wrap align-items-start">
        <div class="mr-8pt">
            <i class="material-icons">access_time</i>
        </div>
        <div class="flex"
                style="min-width: 180px">
            <small class="text-100">
                <strong><?= isset($old) ? 'Modification' : 'Ajout' ?> d'un nouvel user.</strong><br>
                <span>Cette interface vous permet <?= isset($old) ? 'de modifier' : 'd\'ajouter' ?>  un nouvel user.</span>
            </small>
        </div>
    </div>
</div>

<?php

  $reunions = $this->loadModel('reunion')->activeReunion();
?>
<div class="row mb-32pt">
    <div class="col-lg-4">
        <div class="page-separator">
            <div class="page-separator__text">Indications</div>
        </div>
        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Veuillez à remplire tous les champs recquis dans la mésure du possible en respectant éventuellement le type de donnée attendu à savoir du <code>texte uniquement</code> lorsque tu texte est attendu et des <code>entiers uniquement</code> lorsque l'on attend un chiffre.</p>
    </div>
    <div class="col-lg-8 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
          <form action="save" method="post">
            <div class="was-validated">
                <div class="form-row">
                  <div class="col-12 col-md-12 mb-3">
                      <label class="form-label" for="select01">Réunion</label>
                      <select name="id_reunion" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                        <?php foreach($reunions as $reunion) : ?>
                          <?php if (isset($old)) : ?>
                            <?php if($old->id_reunion == $reunion->id) : ?>
                              <option selected value="<?= $reunion->id ?>"> <?= $reunion->nom ?></option>
                            <?php else : ?>
                              <option value="<?= $reunion->id ?>"> <?= $reunion->nom ?></option>
                            <?php endif; ?>
                          <?php else : ?>
                            <option value="<?= $reunion->id ?>"> <?= $reunion->nom ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-feedback">Veuillez sélectionner la réunion dans laquelle cet utilisateur sera enrégistré.</div>
                      <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample01">Nom d'utilisateur</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="username" id="validationSample01" value="<?= $old->username ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="username" id="validationSample01" placeholder="Nom d'utilisateur" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez donner un pseudo pour cet utilisateur.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>

                    <?php if(isset($old)) : ?>
                      <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample02">Mot de passe</label>
                        <input type="text" class="form-control" name="password" id="validationSample02" placeholder="Mot de passe">
                        <div class="invalid-feedback">Veuillez définir un mot de passe pour cet user.</div>
                        <div class="valid-feedback">Parfait!</div>
                      </div>
                    <?php else : ?>
                      <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample02">Mot de passe</label>
                        <input type="text" class="form-control" name="password" id="validationSample02" placeholder="Mot de passe" required>
                        <div class="invalid-feedback">Veuillez définir un mot de passe pour cet user.</div>
                        <div class="valid-feedback">Parfait!</div>
                      </div>
                    <?php endif; ?>
                </div>
            </div>
            <input type="hidden" name="table" value="user">
            <input type="hidden" name="action" value="<?= isset($old) ?'mode' : 'add' ?>">
            <input type="hidden" name="id" value="<?= isset($old) ? $old->id : 0 ?>">
            <button class="btn btn-primary" type="submit"><?= isset($old) ? 'Modifier' : 'Ajouter' ?></button>
          </form>

        </div>
    </div>
</div>