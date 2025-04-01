 // Functie om het aantal nachten te berekenen
 function berekenAantalNachten() {
    const checkIn = new Date(document.getElementById('check_in').value);
    const checkOut = new Date(document.getElementById('check_out').value);
    
    if(checkIn && checkOut) {
        const verschil = checkOut - checkIn;
        return Math.ceil(verschil / (1000 * 60 * 60 * 24));
    }
    return 0;
}

// Functie om de totale prijs te berekenen
function berekenTotalePrijs() {
    const aantalNachten = berekenAantalNachten();
    const kamerSelect = document.getElementById('kamer_id');
    const prijsPerNacht = parseFloat(kamerSelect.options[kamerSelect.selectedIndex].dataset.prijs);
    
    const totalePrijs = aantalNachten * prijsPerNacht;
    document.getElementById('totale_prijs').textContent = `€${totalePrijs.toFixed(2)}`;

    // Update print versie
    document.getElementById('print_naam').textContent = document.getElementById('klant_id').value;
    document.getElementById('print_kamer').textContent = kamerSelect.options[kamerSelect.selectedIndex].text;
    document.getElementById('print_checkin').textContent = document.getElementById('check_in').value;
    document.getElementById('print_checkout').textContent = document.getElementById('check_out').value;
    document.getElementById('print_prijs').textContent = `€${totalePrijs.toFixed(2)}`;
}

// Event listeners toevoegen
document.getElementById('check_in').addEventListener('change', berekenTotalePrijs);
document.getElementById('check_out').addEventListener('change', berekenTotalePrijs);
document.getElementById('kamer_id').addEventListener('change', berekenTotalePrijs);
document.getElementById('klant_id').addEventListener('input', berekenTotalePrijs);