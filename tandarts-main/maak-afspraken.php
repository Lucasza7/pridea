<?php include 'header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center">Maak een Afspraak</h1>
    <p class="text-center">Vul het onderstaande formulier in om een afspraak te maken.</p>

    <!-- Alert Notification -->
    <div id="successAlert" class="alert alert-success d-none" role="alert">
        Uw afspraak is succesvol gemaakt! We nemen zo snel mogelijk contact met u op.
    </div>

    <form id="appointmentForm">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Naam</label>
                <input type="text" class="form-control" id="name" placeholder="Uw naam" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mailadres</label>
                <input type="email" class="form-control" id="email" placeholder="Uw e-mailadres" required>
            </div>
        </div>
        <div class="form-group">
            <label for="phone">Telefoonnummer</label>
            <input type="tel" class="form-control" id="phone" placeholder="Uw telefoonnummer" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="date">Datum</label>
                <input type="date" class="form-control" id="date" required>
            </div>
            <div class="form-group col-md-6">
                <label for="time">Tijd</label>
                <input type="time" class="form-control" id="time" required>
            </div>
        </div>
        <div class="form-group">
            <label for="message">Bericht</label>
            <textarea class="form-control" id="message" rows="3" placeholder="Eventuele opmerkingen"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Afspraak maken</button>
    </form>
</div>

<script>
    document.getElementById('appointmentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Show the success alert
        var successAlert = document.getElementById('successAlert');
        successAlert.classList.remove('d-none'); // Remove the 'd-none' class to show the alert

        // Optionally, you can clear the form fields after submission
        this.reset();
    });
</script>

<?php include 'footer.php'; ?>
