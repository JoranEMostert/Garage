document.querySelectorAll("tr[id]").forEach(tr => {
    let td = tr.querySelector("td:last-of-type");
    let editButton = td.querySelector("button:first-of-type");
    let deleteButton = td.querySelector("button:last-of-type");

    deleteButton.addEventListener("click", async () => {
        let res = await fetch(`user/delete.php?id=${tr.getAttribute("id")}`);
        if(res.status === 200) tr.remove();
        else if(res.status === 400) {}
        else if(res.status === 500) {}
    })

    let isEditing = false;
    editButton.addEventListener("click",async () => {
        let naam=tr.querySelector('td:nth-of-type(3)').innerText;
        let adres=tr.querySelector('td:nth-of-type(4)').innerText;
        let postcode=tr.querySelector('td:nth-of-type(5)').innerText;
        let plaats=tr.querySelector('td:nth-of-type(6)').innerText;

        if(!isEditing) {
            tr.querySelectorAll("td:not(:last-of-type):not(:first-of-type)").forEach(td => {
                td.setAttribute("contenteditable", "true")
            })
            tr.querySelector("td:nth-of-type(2)").focus();

            editButton.querySelector("i").classList.remove("codicon-pencil");
            editButton.querySelector("i").classList.add("codicon-save-as");
            isEditing=true;
        } else {
            tr.querySelectorAll("td:not(:last-of-type):not(:first-of-type)").forEach(td => {
                td.removeAttribute("contenteditable");
            })

            editButton.querySelector("i").classList.add("codicon-pencil");
            editButton.querySelector("i").classList.remove("codicon-save-as");
            isEditing = false;

            let formdata = new FormData();
            formdata.set('naam', tr.querySelector('td:nth-of-type(2)').innerText);
            formdata.set('adres', tr.querySelector('td:nth-of-type(3)').innerText);
            formdata.set('postcode', tr.querySelector('td:nth-of-type(4)').innerText);
            formdata.set('plaats', tr.querySelector('td:nth-of-type(5)').innerText);
            let res = await fetch(`user/update.php?id=${tr.getAttribute("id")}`, {
                body: formdata,
                method: 'POST'
            });

            if (res.status !== 200){
                tr.querySelector('td:nth-of-type(2)').innerText = naam;
                tr.querySelector('td:nth-of-type(3)').innerText = adres;
                tr.querySelector('td:nth-of-type(4)').innerText= postcode;
                tr.querySelector('td:nth-of-type(5)').innerText = plaats;
            }
        }
    })

})
