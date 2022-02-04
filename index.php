<?php
    include "db.php";
    global $conn;
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Garage</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vscode-codicons@0.0.17/dist/codicon.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <div class="container">
                <div class="container mt-5">
                    <p class="mb-3">GitHub: <a href="https://github.com/JoranEMostert/Garage">https://github.com/JoranEMostert/Garage</a></p>
                    <div class="row mb-3">
                        <div class="col-sm d-flex align-items-center">
                            <p class="fw-bold text-left mb-0">Klanten</p>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="searchKlant" placeholder="Zoeken naar klanten...">
                        </div>
                        <div class="col-sm d-flex align-items-center justify-content-end">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createKlant">Nieuwe Klant</button>
                        </div>
                    </div>
                </div>
                <table class="table table-hover text-center" id="klant">
                    <colgroup>
                        <col span="1" style="width: 20px">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: 40px">
                    </colgroup>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Naam</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Postcode</th>
                        <th scope="col">Plaats</th>
                        <th scope="col">Aanpassen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = $conn->query("SELECT * FROM klant ORDER BY id");
                        if($result !== false) {
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $id = htmlentities($row["id"]);
                                    $naam = htmlentities($row["naam"]);
                                    $adres = htmlentities($row["adres"]);
                                    $postcode = htmlentities($row["postcode"]);
                                    $plaats = htmlentities($row["plaats"]);
                                    echo<<<END
            <tr id="$id">
                <th scope="row">$id</th>
                <td>$naam</td>
                <td>$adres</td>
                <td>$postcode</td>
                <td>$plaats</td>
                <td>
                    <button type="button" data-action="edit" class="btn btn-primary btn-sm" style="aspect-ratio: 1/1;display: inline-block;align-items: center" data-bs-toggle="modal" data-bs-target="#editKlant"><i class="codicon codicon-pencil"></i></button>
                    <button type="button" onclick="deleteKlant({$id})" class="btn btn-danger btn-sm" style="aspect-ratio: 1/1;display: inline-block;align-items: center"><i class="codicon codicon-trash"></i></button>
                </td>
            </tr>
    END;
                                }
                            }
                        } else {
                            echo "Error: {$conn->error}";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="container mt-5">
                    <div class="row mb-3">
                        <div class="col-sm d-flex align-items-center">
                            <p class="fw-bold text-left">Auto's</p>
                        </div>
                        <div class="col-sm">
                            <input type="text" class="form-control" id="searchAuto" placeholder="Zoeken naar auto's...">
                        </div>
                        <div class="col-sm d-flex align-items-center justify-content-end">
                            <?php
                                $res = $conn->query("SELECT COUNT(*) FROM `klant`");
                                if($res !== false && $res->num_rows > 0) {
                                    $row = $res->fetch_assoc();
                                    if($row['COUNT(*)'] > 0) {
                                        echo '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createAuto">Nieuwe Auto</button>';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <table class="table table-hover text-center" id="auto">
                    <colgroup>
                        <col span="1" style="width: 20px">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: auto">
                        <col span="1" style="width: 40px">
                    </colgroup>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kenteken</th>
                        <th scope="col">Klant ID</th>
                        <th scope="col">Merk</th>
                        <th scope="col">Type</th>
                        <th scope="col">KM Afstand</th>
                        <th scope="col">Aanpassen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = $conn->query("SELECT * FROM auto ORDER BY autoID");
                        if($result !== false) {
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $autoID = htmlentities($row["autoID"]);
                                    $klantid = htmlentities($row["klantid"]);
                                    $kenteken = htmlentities($row["kenteken"]);
                                    $merk = htmlentities($row["merk"]);
                                    $type = htmlentities($row["type"]);
                                    $kmstand = htmlentities($row["kmstand"]);
                                    echo<<<END
            <tr id="$autoID">
                <th scope="row">$autoID</th>
                <td>$kenteken</td>
                <td>$klantid</td>
                <td>$merk</td>
                <td>$type</td>
                <td>$kmstand</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" style="aspect-ratio: 1/1;display: inline-block;align-items: center" data-bs-toggle="modal" data-bs-target="#editAuto"><i class="codicon codicon-pencil"></i></button>
                    <button type="button" onclick="deleteAuto({$autoID})" class="btn btn-danger btn-sm" style="aspect-ratio: 1/1;display: inline-block;align-items: center"><i class="codicon codicon-trash"></i></button>
                </td>
            </tr>
    END;
                                }
                            }
                        } else {
                            echo "Error: {$conn->error}";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </main>

        <div class="modal" id="createKlant" tabindex="-1" aria-labelledby="createKlantModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/user/register.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="naam" class="form-label">Naam</label>
                                <input type="text" name="naam" class="form-control" id="naam" required>
                            </div>
                            <div class="mb-3">
                                <label for="adres" class="form-label">Adres</label>
                                <input type="text" name="adres" class="form-control" id="adres" required>
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-control" id="postcode" maxlength="6" required>
                            </div>
                            <div class="mb-3">
                                <label for="plaats" class="form-label">Plaats</label>
                                <input type="text" name="plaats" class="form-control" id="plaats" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="editKlant" tabindex="-1" aria-labelledby="editKlantModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/user/update.php" method="POST">
                        <div class="modal-body">
                            <input type="text" name="id" value="" readonly hidden>
                            <div class="mb-3">
                                <label for="naam" class="form-label">Naam</label>
                                <input type="text" name="naam" class="form-control" id="naam" required>
                            </div>
                            <div class="mb-3">
                                <label for="adres" class="form-label">Adres</label>
                                <input type="text" name="adres" class="form-control" id="adres" required>
                            </div>
                            <div class="mb-3">
                                <label for="postcode" class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-control" id="postcode" maxlength="6" required>
                            </div>
                            <div class="mb-3">
                                <label for="plaats" class="form-label">Plaats</label>
                                <input type="text" name="plaats" class="form-control" id="plaats" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-primary">Wijzig</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="createAuto" tabindex="-1" aria-labelledby="createAutoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/mobileauto/register.php" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="kenteken" class="form-label">Kenteken</label>
                                <input type="text" name="kenteken" class="form-control" id="kenteken" maxlength="8" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="klantid" class="mb-2">Klant</label>
                                <select class="form-control" id="klantid" name="klantid" required>
                                    <?php
                                        $res = $conn->query("SELECT id,naam FROM klant ORDER BY id");
                                        if($res !== false && $res->num_rows > 0) {
                                            $a = 0;
                                            while($row = $res->fetch_assoc()) {
                                                echo "<option value='{$row['id']}'>".htmlentities($row['naam'])."</option>";
                                                $a++;
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk</label>
                                <input type="text" name="merk" class="form-control" id="merk" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" name="type" class="form-control" id="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="kmstand" class="form-label">Kilometer Afstand</label>
                                <input type="number" name="kmstand" class="form-control" id="kmstand" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-primary">Toevoegen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal" id="editAuto" tabindex="-1" aria-labelledby="editAutoModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="/mobileauto/update.php" method="POST">
                        <div class="modal-body">
                            <input type="text" name="autoID" value="" readonly hidden>
                            <div class="mb-3">
                                <label for="kenteken" class="form-label">Kenteken</label>
                                <input type="text" name="kenteken" class="form-control" id="kenteken" maxlength="8" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="klantid" class="mb-2">Klant</label>
                                <select class="form-control" id="klantid" name="klantid" required>
                                    <?php
                                        $res = $conn->query("SELECT id,naam FROM klant ORDER BY id");
                                        if($res !== false && $res->num_rows > 0) {
                                            $a = 0;
                                            while($row = $res->fetch_assoc()) {
                                                echo "<option value='{$row['id']}'>".htmlentities($row['naam'])."</option>";
                                                $a++;
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk</label>
                                <input type="text" name="merk" class="form-control" id="merk" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <input type="text" name="type" class="form-control" id="type" required>
                            </div>
                            <div class="mb-3">
                                <label for="kmstand" class="form-label">Kilometer Afstand</label>
                                <input type="number" name="kmstand" class="form-control" id="kmstand" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">Sluiten</button>
                            <button type="submit" class="btn btn-primary">Wijzig</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/fuse.js@6.5.3"></script>
        <script>

            function deleteAuto(id) {
                fetch(`/mobileauto/delete.php?id=${id}`).then(res => {
                    if(res.status === 200) window.location.reload();
                    else window.location.href = `/error.php?code=${res.status}`;
                }).then(err => {
                    console.error(err);
                })
            }

            function deleteKlant(id) {
                fetch(`/user/delete.php?id=${id}`).then(res => {
                    if(res.status === 200) window.location.reload();
                    else window.location.href = `/error.php?code=${res.status}`;
                }).then(err => {
                    console.error(err);
                })
            }

            $("div.modal#editKlant").on("show.bs.modal", e => {
                const   button = e.relatedTarget,
                    modal = e.target,
                    tr = button.parentElement.parentElement,
                    id = tr.id;

                modal.querySelector('input[name="id"]').value = id;
                modal.querySelector('input[name="naam"]').value = tr.querySelector("td:nth-of-type(1)").innerText;
                modal.querySelector('input[name="adres"]').value = tr.querySelector("td:nth-of-type(2)").innerText;
                modal.querySelector('input[name="postcode"]').value = tr.querySelector("td:nth-of-type(3)").innerText;
                modal.querySelector('input[name="plaats"]').value = tr.querySelector("td:nth-of-type(4)").innerText;
            })


            $("div.modal#editAuto").on("show.bs.modal", e => {
                const   button = e.relatedTarget,
                    modal = e.target,
                    tr = button.parentElement.parentElement;

                modal.querySelector('input[name="autoID"]').value = tr.id;
                modal.querySelector('input[name="kenteken"]').value = tr.querySelector("td:nth-of-type(1)").innerText;

                [...modal.querySelectorAll('select > option[selected]')].forEach(option => option.removeAttribute("selected"));

                modal.querySelector(`select > option[value="${tr.querySelector("td:nth-of-type(2)").innerText}"]`)?.setAttribute("selected", "");

                modal.querySelector('input[name="merk"]').value = tr.querySelector("td:nth-of-type(3)").innerText;
                modal.querySelector('input[name="type"]').value = tr.querySelector("td:nth-of-type(4)").innerText;
                modal.querySelector('input[name="kmstand"]').value = tr.querySelector("td:nth-of-type(5)").innerText;
            })

            // window.addEventListener("click", e => {
            //     if(e.target.matches('table#klant tr[id] button[data-action="delete"]')) {
            //         const id = e.target.parentElement.parentElement.id;
            //         fetch(`/user/delete.php?id=${id}`).then(res => {
            //             if(res.status === 200) window.location.reload();
            //             else window.location.href = `/error.php?code=${res.status}`;
            //         }).then(err => {
            //             console.error(err);
            //         })
            //     } else if(e.target.matches('table#auto tr[id] button[data-action="delete"]')) {
            //         const id = e.target.parentElement.parentElement.id;
            //         fetch(`/mobileauto/delete.php?id=${id}`).then(res => {
            //             if(res.status === 200) window.location.reload();
            //             else window.location.href = `/error.php?code=${res.status}`;
            //         }).then(err => {
            //             console.error(err);
            //         })
            //     }
            // });

            {
                // search klant
                const fuse = new Fuse([...document.querySelectorAll("table#klant tr[id]")].map(e => {
                    return {
                        element: e,
                        values: [...e.children].map(el => el.innerText.replaceAll(/\s{2,}/g, " ").trim()).filter(a => a.length > 0)
                    }
                }), {keys: ["values"]});
                const searchInput = document.querySelector("input#searchKlant");
                const tbody = document.querySelector("table#klant > tbody");
                const search = () => {
                    const query = searchInput.value.replaceAll(/\s{2,}/g, " ").trim();
                    if(query.length > 0) {
                        [...document.querySelectorAll("table#klant tr[id]")].forEach(el => el.remove());
                        fuse.search(query).forEach(res => tbody.append(res.item.element));
                    } else fuse._docs.forEach(el => tbody.append(el.element));
                };
                ["change", "keydown", "keyup", "input"].forEach(event => searchInput.addEventListener(event, e => search()));
            }

            {
                // search klant
                const fuse = new Fuse([...document.querySelectorAll("table#auto tr[id]")].map(e => {
                    return {
                        element: e,
                        values: [...e.children].map(el => el.innerText.replaceAll(/\s{2,}/g, " ").trim()).filter(a => a.length > 0)
                    }
                }), {keys: ["values"]});
                const searchInput = document.querySelector("input#searchAuto");
                const tbody = document.querySelector("table#auto > tbody");
                const search = () => {
                    const query = searchInput.value.replaceAll(/\s{2,}/g, " ").trim();
                    if(query.length > 0) {
                        [...document.querySelectorAll("table#auto tr[id]")].forEach(el => el.remove());
                        fuse.search(query).forEach(res => tbody.append(res.item.element));
                    } else fuse._docs.forEach(el => tbody.append(el.element));
                };
                ["change", "keydown", "keyup", "input"].forEach(event => searchInput.addEventListener(event, e => search()));
            }
        </script>
    </body>
</html>