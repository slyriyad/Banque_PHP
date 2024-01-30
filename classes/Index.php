<?php

spl_autoload_register(function ($class_name) {
    require  $class_name . '.php';
});

$t1 = new Titulaire("Martin","luc","1998-02-02","Montbeliard");
$c1 = new Compte("Livret A","euros",$t1);
$c2 = new compte("Compte courant","euros",$t1);

$c1->crediter(20);
$c2->crediter(20);
$c1->virement(20,$c2);
$t1->afficherInfoTitu();
$c2->afficherInfoCompte();