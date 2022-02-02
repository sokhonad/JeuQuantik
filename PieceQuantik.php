<?php
class PieceQuantik
{
    public const  WRITE=0;
    public const  BLACK=1;
    public const   VOID=0;
    public const  CUBE=1;
    public const  CONE=2;
    public const  CYLINDRE=3;
    public const  SPHERE=4;

    protected int $forme;
    protected  int $couleur;

    private function  __construct(int $forme,int $couleur)
    {
        $this->forme=$forme;
        $this->couleur=$couleur;
    }
    public function getForme(): int
    {
        return $this->forme;
    }
    public function getCouleur(): int {
        return $this->couleur;
    }
    public function __toStrig(): string {
        $res="(";
        switch ($this->forme) {
            case self::CUBE:
                $res.="cu:";
                break;
            case self::SPHERE:
                $res.="sp:";
                break;
            case self::CYLINDRE:
                $res.="cy:";
                break;
            case self::CONE:
                $res.="co:";
                break;
            default:
                return "(    )";
        }
        $res.=($this->couleur==self::WRITE)? "W)" :"B)";
	    	return $res;
	  	}
    public static function initVoid():PieceQuantik {
        return new PieceQuantik(self::VOID,self::WRITE);
    }
    public static function initWhiteCube():PieceQuantik {
        return new PieceQuantik(self::CUBE ,self::WRITE);
    }
    public static function initBlackCube():PieceQuantik {
        return new PieceQuantik(self::CUBE,self::BLACK);
    }
    public static function initWriteCone():PieceQuantik {
        return new PieceQuantik(self::CONE,self::WRITE);
    }
    public static function initBlackCone():PieceQuantik {
        return new PieceQuantik(self::CONE,self::BLACK,);
    }
    public static function initWriteSphere():PieceQuantik {
        return new PieceQuantik(self::SPHERE,self::WRITE);
    }
    public static function initBlackSphere():PieceQuantik {
        return new PieceQuantik(self::SPHERE,self::BLACK);
    }
    public static function initWriteCylindre():PieceQuantik {
        return new PieceQuantik(self::CYLINDRE,self::WRITE);
    }
    public static function initBlackCylindre():PieceQuantik {
        return new PieceQuantik(self::CYLINDRE,self::BLACK);
    }
}



