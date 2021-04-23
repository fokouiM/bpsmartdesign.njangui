<div class="alert alert-soft-info mb-lg-32pt">
  <div class="d-flex flex-wrap align-items-start">
      <div class="mr-8pt">
          <i class="material-icons">access_time</i>
      </div>
      <div class="flex"
              style="min-width: 180px">
          <small class="text-100">
              <strong><?= isset($old) ? 'Modification' : 'Ajout' ?> d'un nouveau emprunt.</strong><br>
              <span>Cette interface vous permet <?= isset($old) ? 'de modifier' : 'd\'ajouter' ?>  un nouveau emprunt.</span>
          </small>
      </div>
  </div>
</div>

<?php $membres = $this->loadModel('membre')->currentActiveMembre($_SESSION['bpsmartdesign.njangui.id']); ?>

<div class="row mb-32pt">
    <div class="col-lg-4">
        <div class="page-separator">
            <div class="page-separator__text">Indications</div>
        </div>
        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Veuillez à remplir tous les champs recquis dans la mésure du possible en respectant éventuellement le type de donnée attendu à savoir du <code>texte uniquement</code> lorsque tu texte est attendu et des <code>entiers uniquement</code> lorsque l'on attend un chiffre.</p>
    </div>
    <div class="col-lg-8 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
          <form action="save" method="post">
            <div class="was-validated">
                <div class="form-row">
                  <div class="col-12 col-md-12 mb-3">
                    <label class="form-label" for="select01">Membres</label>
                    <select name="id_membre" class="form-control select2-hidden-accessible" data-select2-id="select01" tabindex="-1" aria-hidden="true">
                      <?php foreach($membres as $membre) : ?>
                        <?php if (isset($old)) : ?>
                          <?php if($old->id_membre == $membre->id) : ?>
                            <option selected value="<?= $membre->id ?>"> <?= $membre->nom_complet ?></option>
                          <?php else : ?>
                            <option value="<?= $membre->id ?>"> <?= $membre->nom_complet ?></option>
                          <?php endif; ?>
                        <?php else : ?>
                          <option value="<?= $membre->id ?>"> <?= $membre->nom_complet ?></option>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">Veuillez sélectionner la réunion dans laquelle cet utilisateur sera enrégistré.</div>
                    <div class="valid-feedback">Parfait!</div>
                  </div>

                  <div class="col-12 col-md-12 mb-3">
                      <label class="form-label" for="validationSample01">Montant emprunté <small> <small><em>Sans l'intérêt</em></small></small> </label>
                      <?php if(isset($old)) : ?>
                        <input type="text" class="form-control" name="montant" id="validationSample01" value="<?= (int)$old->montant ?> " required="">
                      <?php else : ?>
                        <input type="number" class="form-control" name="montant" id="validationSample01" placeholder="Entrer le montant emprunté" required="">
                      <?php endif; ?>
                      <div class="invalid-feedback">Veuillez Renseigner en chiffre le montant versé.</div>
                      <div class="valid-feedback">Parfait!</div>
                  </div>

                  <div class="col-12 col-md-12 mb-3">
                      <label class="form-label" for="validationSample01">Date de emprunt</label>
                      <?php if(isset($old)) : ?>
                        <input type="text" class="form-control" name="date" id="validationSample01" value="<?= $old->date ?> " required="" >
                      <?php else : ?>
                        <input type="date" class="form-control" name="date" id="validationSample01" placeholder="Date de emprunt" required="">
                      <?php endif; ?>
                      <div class="invalid-feedback">Veuillez renseigner la date de emprunt.</div>
                      <div class="valid-feedback">Parfait!</div>
                  </div>
                </div>
            </div>
            <input type="hidden" name="table" value="emprunt">
            <?php if (isset($old)): ?>
              <input type="hidden" name="old_montant" value="<?= $old->montant ?>">
            <?php endif; ?>
            <input type="hidden" name="action" value="<?= isset($old) ?'mode' : 'add' ?>">
            <input type="hidden" name="id" value="<?= isset($old) ? $old->id : 0 ?>">
            <button class="btn btn-primary" type="submit"><?= isset($old) ? 'Modifier' : 'Ajouter' ?></button>
          </form>

        </div>
    </div>
</div>