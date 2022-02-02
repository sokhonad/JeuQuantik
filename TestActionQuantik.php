<?php
require_once "ActionQuantik.php";

$plateauQuantik = new PlateauQuantik();
$plateauQuantik->setPiece(0, 0, PieceQuantik::initWhiteCube());
$plateauQuantik->setPiece(0, 1, PieceQuantik::initBlackCone());
$plateauQuantik->setPiece(0, 2, PieceQuantik::initWriteSphere());
$plateauQuantik->setPiece(0, 3, PieceQuantik::initWriteCylindre());
$plateauQuantik->setPiece(3, 2, PieceQuantik::initWriteSphere());

echo "ActionQuantik", "\n";
$actionQuantik = new ActionQuantik($plateauQuantik);
echo $actionQuantik;
print_r($actionQuantik->getPlateau());
print_r($actionQuantik->isRowWin(0));
echo "isComboWin j'ai ete public pour me Test", "\n";
//echo ActionQuantik::isComboWin($plateauQuantik->getRow(0));
echo "posePiece", "\n";
$actionQuantik->posePiece(0, 1, PieceQuantik::initWriteCone());


echo "\n";




