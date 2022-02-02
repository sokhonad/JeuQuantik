<?php

require_once "PlateauQuantik.php";

$instanceObjet = new PlateauQuantik();
//print_r($instanceObjet->getCase());
echo " Test setPiece", "\n";
$instanceObjet->setPiece(0, 0, PieceQuantik::initBlackSphere());
$instanceObjet->setPiece(0, 1, PieceQuantik::initWriteSphere());
$instanceObjet->setPiece(3, 1, PieceQuantik::initBlackCube());
echo " Test affichage objet", "\n";
echo $instanceObjet;
echo "Test getCol", "\n";
print_r($instanceObjet->getCol(1));
echo "Test getPiece", "\n";
print_r($instanceObjet->getPiece(0, 1));
echo "Test getCorner", "\n";
print_r($instanceObjet->getCorner(0));
echo "Test getCornerFromCoord", "\n";
print_r($instanceObjet->getCornerFromCoord(0, 3));
echo "\n";




