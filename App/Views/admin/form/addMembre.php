<div class="alert alert-soft-info mb-lg-32pt">
    <div class="d-flex flex-wrap align-items-start">
        <div class="mr-8pt">
            <i class="material-icons">access_time</i>
        </div>
        <div class="flex"
                style="min-width: 180px">
            <small class="text-100">
                <strong><?= isset($old) ? 'Modification' : 'Ajout' ?> d'un nouvel Membre.</strong><br>
                <span>Cette interface vous permet <?= isset($old) ? 'de modifier' : 'd\'ajouter' ?>  un nouvel Membre.</span>
            </small>
        </div>
    </div>
</div>

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
                        <label class="form-label" for="validationSample01">Nom complet du membre</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="nom_complet" id="validationSample01" value="<?= $old->nom_complet ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="nom_complet" id="validationSample01" placeholder="Nom complet du membre" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez renseigner le nom complet du membre.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample01">Adresse du membre</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="adresse" id="validationSample01" value="<?= $old->adresse ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="adresse" id="validationSample01" placeholder="Adresse du membre" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez renseigner l'adresse du membre.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="validationSample01">Date de naissance</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="date_naissance" id="validationSample01" value="<?= $old->date_naissance ?> " required="" >
                        <?php else : ?>
                          <input type="date" class="form-control" name="date_naissance" id="validationSample01" placeholder="Date de naissance" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez renseigner la date de naissance.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="validationSample01">Lieu de naissance</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="lieu_naissance" id="validationSample01" value="<?= $old->lieu_naissance ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="lieu_naissance" id="validationSample01" placeholder="Lieu de naissance du membre" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Renseigner le lieu de naissance du membre.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="validationSample01">N° CNI du membre</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="cni" id="validationSample01" value="<?= $old->cni ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="cni" id="validationSample01" placeholder="N° CNI du membre" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Renseigner le n° CNI du membre.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-6 col-md-6 mb-3">
                        <label class="form-label" for="validationSample01">Contact</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="contact" id="validationSample01" value="<?= $old->contact ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="contact" id="validationSample01" placeholder="Contact du membre" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Renseigner le contact du membre.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="table" value="membre">
            <input type="hidden" name="action" value="<?= isset($old) ?'mode' : 'add' ?>">
            <input type="hidden" name="id" value="<?= isset($old) ? $old->id : 0 ?>">
            <button class="btn btn-primary" type="submit"><?= isset($old) ? 'Modifier' : 'Ajouter' ?></button>
          </form>

        </div>
    </div>
</div>