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

<div class="row mb-32pt">
    <div class="col-lg-4">
        <div class="page-separator">
            <div class="page-separator__text">Indications</div>
        </div>
        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Veuillez à remplir tous les champs recquis dans la mésure du possible en respectant éventuellement le type de donnée attendu à savoir du <code>texte uniquement</code> lorsque tu texte est attendu et des <code>entiers uniquement</code> lorsque l'on attend un chiffre.</p>
    </div>
    <div class="col-lg-8 d-flex align-items-center">
        <div class="flex" style="max-width: 100%">
          <form action="process_rembourse" method="post">
            <div class="was-validated">
                <div class="form-row">
                  <div class="col-12 col-md-12 mb-3">
                    <label class="form-label" for="validationSample01">Membre </label>
                    <input type="text" class="form-control" id="validationSample01" disabled value="<?= $membre->nom_complet ?>">
                    <div class="primary-text"><small><em>Membre voulant effectuer un remboursement</em></small></div>
                  </div>
                  
                  <div class="col-6 col-md-6 mb-3">
                    <label class="form-label" for="validationSample01">Montant emprunté </label>
                    <input type="text" class="form-control" id="validationSample01" disabled value="<?= $emprunt->montant ?>">
                    <div class="primary-text"><small><em>Montant perçu lors de l'emprunt</em></small></div>
                  </div>
                  <div class="col-6 col-md-6 mb-3">
                    <label class="form-label" for="validationSample01">Montant attendu </label>
                    <input type="text" class="form-control" id="validationSample01" disabled value="<?= $emprunt->reste ?>">
                    <div class="primary-text"><small><em>Montant à rembourser attendu</em></small></div>
                  </div>

                  <div class="col-12 col-md-12 mb-3">
                    <label class="form-label" for="validationSample01"> Montant versé</label>
                    <input type="number" min="0" max="<?= $emprunt->reste ?>" class="form-control" name="montant" id="validationSample01" placeholder="Entrer le montant remboursé (<= au montant emprunté)" required="">
                    <div class="invalid-feedback">Combien le membre souhaite t-il rembourser? (<= <?= $emprunt->reste ?>)</div>
                    <div class="valid-feedback">Parfait!</div>
                  </div>
                </div>
            </div>
            <input type="hidden" name="id_membre" value="<?= $membre->id ?>">
            <input type="hidden" name="id_emprunt" value="<?= $emprunt->id ?>">
            <button class="btn btn-primary" type="submit">Rembourser</button>
          </form>

        </div>
    </div>
</div>