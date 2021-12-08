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
    editButton.addEventListener("click",() => {
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
            isEditing=false;
            //
        }
    })

})
