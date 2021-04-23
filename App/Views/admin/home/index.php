<div class="alert alert-soft-warning mb-lg-32pt">
    <div class="d-flex flex-wrap align-items-start">
        <div class="mr-8pt">
            <i class="material-icons">access_time</i>
        </div>
        <div class="flex"
                style="min-width: 180px">
            <small class="text-100">
                <strong>Analytics Service Issues.</strong><br>
                <span>You may experience some issues with the Analytics API. Stay up to date by following our status page.</span>
            </small>
        </div>
    </div>
</div>

<div class="page-separator">
    <div class="page-separator__text">Bilans</div>
</div>

<div class="row card-group-row mb-lg-8pt">
    <div class="col-xl-3 col-md-6 card-group-row__col">
        <div class="card card-group-row__card" style="background: #007bff; color: #fff">
            <div class="card-body d-flex flex-column align-items-center">
                <i class="material-icons icon-32pt text-20 mb-4pt">access_time</i>
                <div class="d-flex align-items-center">
                    <div class="h2 mb-0 mr-3" style="color: #fff"><?= ceil($_SESSION['bpsmartdesign.njangui.total_depot'] / 1000) ?> K</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Dépots</strong></p>
                        <p class="text-50 mb-0 mt-n1 d-flex align-items-center">
                            31.5%
                            <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 card-group-row__col">
        <div class="card card-group-row__card" style="background: #900; color: #fff">
            <div class="card-body d-flex flex-column align-items-center">
                <i class="material-icons icon-32pt text-20 mb-4pt">attach_money</i>
                <div class="d-flex align-items-center">
                    <div class="h2 mb-0 mr-3" style="color: #fff"><?= ceil($_SESSION['bpsmartdesign.njangui.total_emprunt'] / 1000) ?> k</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Emprunts</strong></p>
                        <p class="text-50 mb-0 mt-n1 d-flex align-items-center">
                            51.5%
                            <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 card-group-row__col">
        <div class="card card-group-row__card" style="background: #00bcc2; color: #fff">
            <div class="card-body d-flex flex-column align-items-center">
                <i class="material-icons icon-32pt text-20 mb-4pt">attach_money</i>
                <div class="d-flex align-items-center">
                    <div class="h2 mb-0 mr-3" style="color: #fff"><?= ceil($_SESSION['bpsmartdesign.njangui.total_solde'] / 1000) ?> k</div>
                    <div class="flex">
                        <p class="mb-0"><strong>Solde</strong></p>
                        <p class="text-50 mb-0 mt-n1 d-flex align-items-center">
                            19.5%
                            <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-separator">
    <div class="page-separator__text">Membres de la réunion</div>
</div>

<div class="card mb-lg-32pt">

    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-employee-name" data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

        <div class="card-header">
            <form class="form-inline">
                <label class="mr-sm-2 form-label" for="inlineFormFilterBy">Filter by:</label>
                <input type="text" class="form-control search mb-2 mr-sm-2 mb-sm-0" id="inlineFormFilterBy" placeholder="Search ...">

                <div class="ml-auto mb-2 mb-sm-0 custom-control-inline mr-0">
                    <label class="form-label mb-0" for="active">Active</label>
                    <div class="custom-control custom-checkbox-toggle ml-8pt">
                        <input checked="" type="checkbox" id="active" class="custom-control-input">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                </div>

            </form>
        </div>

        <table class="table mb-0 thead-border-top-0 table-nowrap">
            <thead>
                <tr>

                    <th style="width: 18px;"
                        class="pr-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#staff" id="customCheckAllstaff">
                            <label class="custom-control-label" for="customCheckAllstaff"><span class="text-hide">Toggle all</span></label>
                        </div>
                    </th>

                    <th> Nom Complet </th>
                    <th> Adresse </th>
                    <th> Naissance </th>
                    <th> Contact </th>
                    <th> CNI </th>
                </tr>
            </thead>
            <tbody class="list" id="staff">
                <?php foreach($membres as $v) : ?>
                    <tr>

                        <td class="pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_1">
                                <label class="custom-control-label" for="customCheck1_1"><span class="text-hide">Check</span></label>
                            </div>
                        </td>

                        <td>

                            <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                            <div class="avatar avatar-32pt mr-8pt">

                                    <img src="../Dist/assets/images/people/50/guy-3.jpg" alt="Avatar" class="avatar-img rounded-circle">

                                </div>
                                <div class="media-body">

                                    <div class="d-flex flex-column">
                                        <p class="mb-0"><strong class="js-lists-values-employee-name"><?= $v->nom_complet ?></strong></p>
                                        <small class="js-lists-values-employee-email text-50"></small>
                                    </div>

                                </div>
                            </div>

                        </td>
                        <td><?= $v->adresse ?></td>
                        <td><?= $v->date_naissance.' à '. $v->lieu_naissance ?></td>
                        <td><?= $v->contact ?></td>
                        <td><?= $v->cni ?></td>
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
                    <span>Prec</span>
                </a>
            </li>
            <li class="page-item dropdown">
                <a class="page-link dropdown-toggle" data-toggle="dropdown" href="#" aria-label="Page">
                    <span>1</span>
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item active">1</a>
                </div>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span>Suiv</span>
                    <span aria-hidden="true" class="material-icons">chevron_right</span>
                </a>
            </li>
        </ul>

    </div>

</div>

