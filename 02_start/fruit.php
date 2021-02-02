<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Fruit" ,
                        $subtitle = "" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php

    $output = "Spelen met fruit<br>";

    $ananas = new Fruit( $pname="Mooie Ananas", $pcolor="bruin/groen" );
    $kiwi = new Fruit( $pname="Gele Kiwi", $pcolor="geel" );
    $kiwi_1 = new Fruit( $pname="Blauwe Kiwi", $pcolor="blauw" );
    $aardbei1 = new Aardbei( $pname="Grote Aardbei", $pcolor="rood" );
    $aardbei1->setSmaak("Heel zoet");

    $output .= "We hebben een " . $ananas->getCapsname() . "<br>";
    print "<br><br>";
    $output .= "en ook een " . $kiwi->getName() . "<br>";
    $output .= "en ook een " . $aardbei1->getName() . " en die is " . $aardbei1->getSmaak() . "<br>";

    if ( $kiwi instanceof Fruit ) print "De kiwi is wel degelijk een stuk fruit, en geen vogel";

    //lijst (array) van objecten
    $mijn_stukken_fruit = [ $ananas, $kiwi, $kiwi_1, $aardbei1 ];

    print "Overzicht van mijn fruitmand:<br>";

    foreach( $mijn_stukken_fruit as $stuk_fruit )
    {
        print $stuk_fruit->getName() . ",";
    }

    print "<br><br>";

    print $output;
?>

    </div>
</div>

</body>
</html>