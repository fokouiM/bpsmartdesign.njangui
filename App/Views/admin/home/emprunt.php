<div class="alert alert-soft-info mb-lg-32pt">
    <div class="d-flex flex-wrap align-items-start">
        <div class="mr-8pt">
            <i class="material-icons">access_time</i>
        </div>
        <div class="flex"
                style="min-width: 180px">
            <small class="text-100">
                <strong>Gestion des emprunts.</strong><br>
                <span>Cette interface vous permet de visualiser les différents emprunts de la réunion.</span>
            </small>
        </div>
    </div>
</div>

<div class="card dashboard-area-tabs p-relative o-hidden mb-lg-32pt">
    <div class="card-header p-0 nav">
        <div class="row no-gutters border-right" role="tablist">
            <div class="col-auto">
                <a href="#" data-toggle="tab" role="tab" aria-selected="true" class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start active">
                    <span class="h2 mb-0 mr-3"><?= count($emprunts) ?></span>
                    <span class="flex d-flex flex-column">
                        <strong class="card-title">emprunts</strong>
                        <small class="card-subtitle text-50">Enrégistrées pour l'instant</small>
                    </span>
                </a>
            </div>
        </div>
        <form method="post" action="addElement" class="col-auto addNew">
          <input type="hidden" name="table" value="emprunt">
          <input type="hidden" name="action" value="add">

          <input type="submit" value="Ajouter" class="btn btn-accent">
        </form>
    </div>

    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-date" data-lists-sort-desc="true" data-lists-values='["js-lists-values-lead", "js-lists-values-project", "js-lists-values-status", "js-lists-values-budget", "js-lists-values-date"]'>
        <table class="table mb-0 thead-border-top-0 table-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Réunion</th>
                    <th>Membre</th>
                    <th>Montant</th>
                    <th>Reste</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="list">
              <?php foreach($emprunts as $emprunt) : ?>
                <tr>
                    <td> <?= $emprunt->id ?> </td>
                    <td> <?= $emprunt->reunion ?> </td>
                    <td> <?= $emprunt->membre ?> </td>
                    <td> <?= $emprunt->montant.' Frs CFA' ?> </td>
                    <td> <?= $emprunt->reste.' Frs CFA' ?> </td>
                    <td> <?= $emprunt->date ?> </td>
                    <td>
                      <?php if ($emprunt->reste > 0) : ?>
                        <div class="d-flex flex-column">
                            <small class="js-lists-values-status text-50 mb-4pt">Non remboursé</small>
                            <span class="indicator-line rounded bg-danger"></span>
                        </div>
                      <?php else : ?>
                        <div class="d-flex flex-column">
                            <small class="js-lists-values-status text-50 mb-4pt">Remboursé</small>
                            <span class="indicator-line rounded bg-primary"></span>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td class="text-right">
                      <form action="modElement" method="post" style="display: inline-block">
                        <input type="hidden" name="table" value="emprunt">
                        <input type="hidden" name="action" value="mod">
                        <input type="hidden" name="id" value="<?= $emprunt->id ?>">

                        <button type="submit" class="btn btn-warning">
                          <i class="material-icons">create</i>
                        </button>
                      </form>
                      <form action="rembourse" method="post" style="display: inline-block">
                        <input type="hidden" name="membre" value="<?= $emprunt->id_membre ?>">
                        <input type="hidden" name="id" value="<?= $emprunt->id ?>">

                        <button type="submit" class="btn btn-success">
                          <i class="material-icons">restore</i>
                        </button>
                      </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <div class="card-footer p-8pt">

        <ul class="pagination justify-content-start pagination-xsm m-0">
            <li class="page-item disabled">
                <a class="page-link"
                    href="#"
                    aria-label="Previous">
                    <span aria-hidden="true"
                          class="material-icons">chevron_left</span>
                    <span>Prev</span>
                </a>
            </li>
            <li class="page-item dropdown">
                <a class="page-link dropdown-toggle"
                    data-toggle="dropdown"
                    href="#"
                    aria-label="Page">
                    <span>1</span>
                </a>
                <div class="dropdown-menu">
                    <a href="#"
                        class="dropdown-item active">1</a>
                    <a href="#"
                        class="dropdown-item">2</a>
                    <a href="#"
                        class="dropdown-item">3</a>
                    <a href="#"
                        class="dropdown-item">4</a>
                    <a href="#"
                        class="dropdown-item">5</a>
                </div>
            </li>
            <li class="page-item">
                <a class="page-link"
                    href="#"
                    aria-label="Next">
                    <span>Next</span>
                    <span aria-hidden="true"
                          class="material-icons">chevron_right</span>
                </a>
            </li>
        </ul>

    </div>

</div>
