<div class="alert alert-soft-info mb-lg-32pt">
    <div class="d-flex flex-wrap align-items-start">
        <div class="mr-8pt">
            <i class="material-icons">access_time</i>
        </div>
        <div class="flex"
                style="min-width: 180px">
            <small class="text-100">
                <strong><?= isset($old) ? 'Modification' : 'Ajout' ?> d'une nouvelle réunion.</strong><br>
                <span>Cette interface vous permet <?= isset($old) ? 'de modifier' : 'd\'ajouter' ?>  une nouvelle réunion.</span>
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
                        <label class="form-label" for="validationSample01">Nom de la réunion</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="nom" id="validationSample01" value="<?= $old->nom ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="nom" id="validationSample01" placeholder="Nom de la réunion" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez donner un nom pour cette réunion.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample02">Description de la réunion</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="description" id="validationSample02" value="<?= $old->description ?> ">
                        <?php else : ?>
                          <input type="text" class="form-control" name="description" id="validationSample02" placeholder="Description de la réunion">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez donner une brève description à cette réunion.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                    <div class="col-12 col-md-12 mb-3">
                        <label class="form-label" for="validationSample03">Taux d'intérêt de la réunion</label>
                        <?php if(isset($old)) : ?>
                          <input type="text" class="form-control" name="taux" id="validationSample03" value="<?= $old->taux ?> " required="">
                        <?php else : ?>
                          <input type="text" class="form-control" name="taux" id="validationSample03" placeholder="Taux d'intérêt de la réunion" required="">
                        <?php endif; ?>
                        <div class="invalid-feedback">Veuillez déterminer le taux d'intérêt de cette réunion.</div>
                        <div class="valid-feedback">Parfait!</div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="table" value="reunion">
            <input type="hidden" name="action" value="<?= isset($old) ?'mode' : 'add' ?>">
            <input type="hidden" name="id" value="<?= isset($old) ? $old->id : 0 ?>">
            <button class="btn btn-primary" type="submit"><?= isset($old) ? 'Modifier' : 'Ajouter' ?></button>
          </form>

        </div>
    </div>
</div>