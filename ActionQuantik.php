<?php
require_once "PlateauQuantik.php";

class ActionQuantik
{
    protected $plateau;

    function __construct(PlateauQuantik $plateau)
    {
        $this->plateau = $plateau;
    }

    public function getPlateau(): PlateauQuantik
    {
        return $this->plateau;
    }

    public function isRowWin(int $numRow): bool
    {
        $compter = 1;
        $arrayName = array();
        $arrayName = $this->plateau->getRow($numRow);
        for ($i = 1; $i < 4; $i++) {
            if ($arrayName[0]->getCouleur() == $arrayName[$i]->getCouleur() && $arrayName[0]->getForme() != $arrayName[$i]->getForme()) {
                $compter++;
            }
        }
        if ($compter >= 3) {
            return true;
        } else {
            printf("false");
            return false;
        }
    }

    public function posePiece(int $rowNun, int $colNum, PieceQuantik $piece): void
    {
        if ($this->isValidePose($rowNun, $colNum, $piece)) {
            $this->plateau->setPiece($rowNun, $colNum, $piece);
        } else {
            printf("Il n'est valide de poser");
            echo "\n";
        }
    }

    public function isColWin(int $numCol): bool
    {
        $compter = 1;
        $arrayName = array();
        $arrayName = $this->plateau->getCol($numCol);
        for ($i = 1; $i < 4; $i++) {
            if ($arrayName[0]->getCouleur() == $arrayName[$i]->getCouleur() && $arrayName[0]->getForme() != $arrayName[$i]->getForme()) {
                $compter++;
            }
        }
        if ($compter >= 3) {
            return true;
        } else {
            printf("false");
            return false;
        }
    }

    public function isCorneWin(int $dir): bool
    {
        $compter = 1;
        $arrayName = array();
        $arrayName = $this->plateau->getCorner($dir);
        for ($i = 1; $i < 4; $i++) {
            if ($arrayName[0]->getCouleur() == $arrayName[$i]->getCouleur() && $arrayName[0]->getForme() != $arrayName[$i]->getForme()) {
                $compter++;
            }
        }
        if ($compter >= 3) {
            return true;
        } else {
            printf("false\n");
            echo "\n";
            return false;
        }
    }

    public function isValidePose(int $rowNum, int $colNum, PieceQuantik $piece): bool
    {
        $arrayName1 = array();
        $arrayName1 = $this->getPlateau()->getRow($rowNum);
        $arrayName2 = array();
        $arrayName2 = $this->getPlateau()->getCol($colNum);
        for ($i = 0; $i < 4; $i++) {
            if ($arrayName1[$i]->getForme() == $piece->getForme() && $arrayName1[$i]->getCouleur() != $piece->getCouleur() || $arrayName2[$i]->getForme() == $piece->getForme() && $arrayName1[$i]->getCouleur() != $piece->getCouleur()) {
                return false;
            }
        }
        return true;
    }

    private static function isComboWin(array $tabPieces): bool
    {
        $compter = 1;
        for ($i = 1; $i < 4; $i++) {
            if ($tabPieces[0]->getCouleur() == $tabPieces[$i]->getCouleur() && $tabPieces[0]->getForme() != $tabPieces[$i]->getForme()) {
                $compter++;
            }
        }
        if ($compter >= 3) {
            return true;
        } else {
            printf("false");
            return false;
        }
    }

    private function isValidePiece(array $tabPieces, PieceQuantik $piece): bool
    {//revoir
        for ($i = 1; $i < 4; $i++) {
            if ($tabPieces[$i]->getCouleur() != $piece->getCouleur() && $tabPieces[$i]->getForme() == $piece->getForme()) {
                return false;
            }
        }
        return true;
    }

    public function __toString(): string
    {
        return $this->plateau->__toString();
    }
}


?>
