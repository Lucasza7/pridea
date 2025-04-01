<?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>Bereik Ons</h1>
        <p>Heb je vragen of wil je een afspraak maken? Neem dan gerust contact met ons op. We zijn hier om je te helpen!</p>

        <div class="row mt-4">
            <!-- Contact Formulier -->
            <div class="col-md-6">
                <h2>Stuur ons een bericht</h2>
                <form action="verzend_contact.php" method="POST">
                    <div class="form-group">
                        <label for="naam">Naam:</label>
                        <input type="text" class="form-control" id="naam" name="naam" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="onderwerp">Onderwerp:</label>
                        <input type="text" class="form-control" id="onderwerp" name="onderwerp" required>
                    </div>
                    <div class="form-group">
                        <label for="bericht">Bericht:</label>
                        <textarea class="form-control" id="bericht" name="bericht" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Verzend</button>
                </form>
            </div>

<!-- Contactinformatie -->
<div class="col-md-6">
    <h2>Onze Contactgegevens</h2>
    <p><strong>Adres:</strong> Glimlachlaan 321, Tandenstad</p>
    <p><strong>Telefoon:</strong> 0800-TANDJES (0800-8263537)</p>
    <p><strong>Email:</strong> bling@tandarts.tand</p>

    <!-- Google Maps Embed -->
    <h3>Vind ons op de kaart</h3>
    <div style="width: 100%">
        <iframe
            width="100%"
            height="300"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509379!2d144.95373531531663!3d-37.81627967975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf5776b1b8f695d84!2s321%20Smile%20Street%2C%20Tooth%20Town!5e0!3m2!1sen!2snl!4v1611849998276!5m2!1sen!2snl"
            frameborder="0"
            style="border:0"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0">
        </iframe>
    </div>
</div>

        </div>
    </div>
<?php include 'footer.php'; ?>
