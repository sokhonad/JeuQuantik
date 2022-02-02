<?php
require_once "PieceQuantik.php";

class PlateauQuantik
{
    public const NBROWS = 4;
    public const  NBCOLS = 4;
    public const   NW = 0;
    public const  NE = 1;
    public const  SW = 2;
    public const  SE = 3;
    protected array $cases;

    function __construct()
    {
        $this->cases = array();
        for ($i = 0; $i < self::NBROWS; $i++) {
            $this->cases[$i] = array();
            for ($j = 0; $j < self::NBCOLS; $j++) {
                $this->cases[$i][$j] = PieceQuantik::initVoid();
            }
        }
    }

    public function getPiece(int $rowNum, int $colNum): PieceQuantik
    {
        return $this->cases[$rowNum][$colNum];
    }

    public function getCase(): array
    {
        return $this->cases;
    }

    public function setPiece(int $rowNum, int $colNum, PieceQuantik $p): void
    {
        $this->cases[$rowNum][$colNum] = $p;
    }

    public function getRow(int $NumRow): array
    {
        return $this->cases[$NumRow];
    }

    public function getCol(int $NumCol): array
    {
        $arrayName = array();
        for ($i = 0; $i < self::NBROWS; $i++) {
            $arrayName[$i] = $this->cases[$i][$NumCol];
        }
        return $arrayName;
    }

    public function getCorner(int $dir): array
    {
        $arrayName = array();
        switch ($dir) {
            case self::NW:
                for ($i = 0; $i < self::NBROWS / 2; $i++) {
                    for ($j = 0; $j < self::NBCOLS / 2; $j++) {
                        $arrayName[] = $this->cases[$i][$j];
                    }
                }
                return $arrayName;
            case self::NE:
                for ($i = 0; $i < self::NBROWS / 2; $i++) {
                    for ($j = self::NBCOLS / 2; $j < self::NBCOLS; $j++) {
                        $arrayName[] = $this->cases[$i][$j];
                    }
                }
                return $arrayName;
            case self::SW:
                for ($i = self::NBROWS / 2; $i < self::NBROWS; $i++) {
                    for ($j = 0; $j < self::NBCOLS / 2; $j++) {
                        $arrayName[] = $this->cases[$i][$j];
                    }
                }
                return $arrayName;
            case self::SE:
                for ($i = self::NBROWS / 2; $i < self::NBROWS; $i++) {
                    for ($j = self::NBCOLS / 2; $j < self::NBCOLS; $j++) {
                        $arrayName[] = $this->cases[$i][$j];
                    }
                }
                return $arrayName;
            default:
                return $arrayName;
        }
    }

    public function __toString(): string
    {
        $res = "";
        for ($i = 0; $i < self::NBROWS; $i++) {
            for ($j = 0; $j < self::NBCOLS; $j++) {
                $res .= $this->cases[$i][$j]->__toStrig();
            }
            $res .= "\n";
        }
        return $res;
    }

    public static function getCornerFromCoord(int $rowNum, int $colNum): int
    {
        if ($rowNum < 2) {
            if ($colNum < 2) {
                return PlateauQuantik::NW;
            } else {
                return PlateauQuantik::NE;
            }
        } else {
            if ($colNum < 2) {
                return PlateauQuantik::SW;
            } else {
                return PlateauQuantik::SE;
            }
        }

    }

}

