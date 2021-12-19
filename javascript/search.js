function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        /*
            Deze for-loop loopt door alle cellen in een rij en pakt de innerText van elke cell,
            maar dit wordt dan een langere loop en is een beetje onnodig omdat je de inner-tekst
            van de hele rij in een kéér kan pakken.

            // td = tr[i].getElementsByTagName("td");

            // for (j = 0; j < td.length; j++) {
            //     if (td[j].innerText.toUpperCase().indexOf(filter) > -1) {
            //         found = true;
            //     }
            // }
         */

        /* dit pakt de innerText van de hele rij en controleert of het de zoekterm bevat */
        found = tr[i].innerText.toUpperCase().indexOf(filter) > -1;

        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}