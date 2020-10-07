<?php
$larticle = array(
    'marteau' => 10, 'tenaille' => 5, 'vis' => 5.2, 'clou' => 5.8,
    'tournevis' => 7, 'ciseau' => 4, 'toile émeri' => 3
);

/**
 * Les variables
 * $_POST['produit'] : contient le nom du produit à ajouter (example : 'marteau')
 * $_POST['qtt'] : contient la quantité a ajouté
 * 
 * $_POST['erase'] : si défini et sa valeur est differente de 'nothing' alors la variable contient le nom de l'article à supprimer
 *  example : $_POST['erase'] == 'marteau'
 *  alors supprimer $_POST['marteau'] (  d'ou le $_POST[$_POST['erase']]  )
 *  la suppresion d'une variable se fait avec unset(NOM_DE_LA_VARIABLE)
 * 
 * les variables suivant peuvent (ou pas) être défini
 * $_POST['marteur'] : si défini alors un marteau à déja été commandé, cette variable contien la quantité commandé
 * .... jusqu'a ...
 * $_POST['toile émeri'] (voir la variable $larticle)
 * 
 * example pour ajouter 5 marteau
 * -> $_POST['produit'] == 'marteau'
 * -> $_POST['qtt'] == 5
 * -> donc pour définir $_POST['marteau'] faut faire => $_POST[$_POST['produit']] = $_POST['qtt'];
 */


?>

<form method="post">
    <?php
    /* Voir si la variable $_POST['earase'] est définie (alors il y'a quelquechose a supprimer) */
    if (isset($_POST['erase']) && ($_POST['erase'] != 'nothing') && isset($_POST[$_POST['erase']]))
        unset($_POST[$_POST['erase']]); /*  */

    /* définir $_POST['produit'] dans $_POST[$_POST['produit']] */
    /**
     * En gros si $_POST['produit'] == 'marteau' alors
     * définir $_POST['marteau']
     */
    if (isset($_POST['produit']) && isset($_POST['qtt']) && $_POST['qtt'] > 0) {
        if (isset($_POST[$_POST['produit']])) { // si l'article existe déjà
            $_POST[$_POST['produit']] += $_POST['qtt'];
        } else {    // sinon le définir
            $_POST[$_POST['produit']] = $_POST['qtt'];
        }
    }
    foreach ($larticle as $key => $value) { /* Parcourire tout les elements de $larticle */
        if (isset($_POST[$key])) { 
            /* pour chaque element si défini ajouter un input hidden (champ caché) */
            echo '<input type="hidden" name="' . $key . '" value="' . $_POST[$key] . '">';
        }
    }
    ?>
    <label for="produit">Ajouter : </label>
    <select name="produit" id="produit">
        <?php
        /* Affiche les article qu'on peut selectionner (défini dans $larticle) */
        foreach ($larticle as $key => $value) {
            echo '<option value="' . $key . '">' . $key . ' (' . $value . '€)</option>';
        }
        ?>
    </select>
    <input type="number" name="qtt" required value="0" />
    <br>
    <?php
    $b = false; 
    /* si au moin un des article est défini dans le $_POST[] alors $b va valoir true */
    foreach ($larticle as $key => $value) {
        if (isset($_POST[$key])) {
            $b = true;
        }
    }
    if ($b) { /* Si $b == false alors il n'y a aucun produit à enlever */
        ?>
        <label for="erase">Enlever : </label>
        <select name="erase" id="erase">
            <option value="nothing">Walou</option>
            <?php
                foreach ($larticle as $key => $value) {
                    if (isset($_POST[$key])) {
                        echo '<option value="' . $key . '">' . $key . ' (' . $value . '€)</option>';
                    }
                }
                ?>
        </select>

    <?php
    }
    ?>
    <br>
    <input type="submit" value="OK">

</form>

<?php

/* Affichage du résultat */
/* Compliqué pour rien on peut faire plus simple (mais j'ai la flemme) */
$total = 0; // somme en €
if (isset($_POST['produit']) && isset($_POST['qtt']) && $_POST['qtt'] > 0 && !isset($_POST[$_POST['produit']])) {
    echo $_POST['produit'] . ' * ' . $_POST['qtt'] . ' : ' . ($_POST['qtt'] * $larticle[$_POST['produit']]) . '€<br>';
    $total = $_POST['qtt'] * $larticle[$_POST['produit']];
}


foreach ($larticle as $key => $value) {
    if (isset($_POST[$key])) {
        echo $key . ' * ' . $_POST[$key] . ' : ' . ($_POST[$key] * $larticle[$key]) . '€<br>';
        $total += $_POST[$key] * $larticle[$key];
    }
}

echo '<hr>';
if ($total > 0)
    echo 'Total : ' . $total . '€<br>';

?>