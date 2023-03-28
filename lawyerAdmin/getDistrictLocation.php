<?php

use PhpOption\Option;

$province = $_POST['item'];

// $row = mysqli_fetch_array($data);

// $results = explode(",", $row[0]);
// $index = 0;
if ($province == "South") {
?>
    <option value="">.....</option>
    <option>Huye</option>
    <option>Gisagara</option>
    <option>Nyanza</option>
    <option>Muhanga</option>
    <option>Kamonyi</option>
    <option>Ruhango</option>
    <option>Nyamagabe</option>
    <option>Nyaruguru</option>
<?php
}
if ($province == "North") {
?>
    <option value="">.....</option>
    <option>Gicumbi</option>
    <option>Rurindo</option>
    <option>Burera</option>
    <option>Musanze</option>
    <option>Gakenke</option>

<?php
}
if ($province == "East") {
?>
    <option value="">.....</option>
    <option>Nyagatare</option>
    <option>Kayonza</option>
    <option>Rwamagana</option>
    <option>Kirehe</option>
    <option>Bugesera</option>
    <option>Ngoma</option>

<?php
}
if ($province == "West") {
?>
    <option value="">.....</option>
    <option>Rubavu</option>
    <option>Nyabihu</option>
    <option>Ngororero</option>
    <option>Nyamasheke</option>
    <option>Karongi</option>
    <option>Rusizi</option>
    <option>Gatsibo</option>

<?php
}
if ($province == "Kigali") {
?>
    <option value="">.....</option>
    <option>Gasabo</option>
    <option>Nyarugenge</option>
    <option>Kicukiro</option>

<?php
}
