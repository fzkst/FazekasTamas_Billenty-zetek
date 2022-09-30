function validalas() {
    const termek = document.forms['billentyuzet_felvetel']['termek'].value;
    const megjelenes = document.forms['billentyuzet_felvetel']['megjelenes'].value;
    const kapcsolodas = document.forms['billentyuzet_felvetel']['kapcsolodas'].value;
    const meret = document.forms['billentyuzet_felvetel']['meret'].value;   
    if (termek.trim().length == 0) {
        alert("A termék megadása kötelező");
        return false;
    }
    if (megjelenes.trim().length == 0) {
        alert("A megjelenés évét kötelező megadni");
        return false;
    }
    if (megjelenes != parseInt(megjelenes)) {
        alert("A megjelenés éve csak szám lehet");
        return false;
    }
    const maiDatum = new Date();
    const maiEvszam = maiDatum.getFullYear();
    if (megjelenes < 1950 || megjelenes > maiEvszam) {
        alert(`A megjelenés éve 1950 és ${maiEvszam} közé kell hogy essen`);
        return false;
    }
    if (meret.trim().length == 0) {
        alert("A méret megadása kötelező");
        return false;
    }
    if (kapcsolodas.trim().length == 0) {
        alert("A kapcsolodás típusát kötelező megadni");
        return false;
    }                 
    return false;        
}           
                   
