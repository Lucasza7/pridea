<?php include 'header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center">Beheer Uw Afspraken</h1>
    <p class="text-center">Bekijk en beheer uw afspraken hieronder.</p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Datum</th>
                <th scope="col">Tijd</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Jan Jansen</td>
                <td>2024-10-30</td>
                <td>10:00</td>
                <td>
                    <button class="btn btn-warning btn-sm">Bewerken</button>
                    <button class="btn btn-danger btn-sm">Annuleren</button>
                </td>
            </tr>
            <tr>
                <td>Piet Pietersen</td>
                <td>2024-11-05</td>
                <td>11:30</td>
                <td>
                    <button class="btn btn-warning btn-sm">Bewerken</button>
                    <button class="btn btn-danger btn-sm">Annuleren</button>
                </td>
            </tr>
            <!-- Voeg hier meer afspraken toe -->
        </tbody>
    </table>

    <div class="text-center">
        <button class="btn btn-secondary">Nieuwe Afspraak Maken</button>
    </div>
</div>
<?php include 'footer.php'; ?>
