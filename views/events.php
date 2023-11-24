<main>
    <h2 class="text-center mt-4 text-white">Calendrier des événements </h2>
    <p class="text-white text-center">En cours de développement</p>
    <div class="container mt-4">
        <form method="get">
            <div class="row justify-content-center">
                <div class="col-2">
                    <select class="form-select" name="month" id="month">
                        <?php foreach ($months as $key => $value) { ?>
                            <?php $isSelected = ($month == $key + 1) ? 'selected' : ''; ?>
                            <?= '<option value="' . ($key + 1) . '" ' . $isSelected . '>' . $value . '</option>' ?>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-2">
                    <select class="form-select" name="year" id="year">
                        <?php for ($i = date('Y') - 3; $i <= date('Y') + 3; $i++) { ?>
                            <?php $isSelected = ($year == $i) ? 'selected' : ''; ?>
                            <?= "<option $isSelected>$i</option>" ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>

        <div class="container mt-4">
            <table class="table">
                <thead class="table-white">
                    <tr class="text-center">
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $x = 0;
                    for ($j = 1; $j <= $nbWeeks; $j++) { ?>
                        <tr>
                            <?php
                            for ($i = 1; $i <= 7; $i++) {
                                if (date('Ynj') == $year . $month . $calendar[$x]) {
                                    $className = 'bg-primary';
                                } else {
                                    $className = '';
                                }
                                echo '<td class="' . $className . ' . text-center">' . $calendar[$x] . '</td>';
                                $x++;
                            } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>