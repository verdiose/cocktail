<?php
	// Il était une fois un codio (= un petit bout de code) insignifiant qui cherchait sa place dans le vaste univers binaire.
	// Aucun programme ne se pré-occupait de lui tant il était petit.
	// Au fur et à mesure du TAI (temps atomique international ), le codio subissait une lente et progressive métamorphose,
	// son insipidité devint frustration
	// sa timidité devint colère
	// Et ce n'est qu'au terme de cette évolution et un terrible bug inhérent
	// que le grand Magisterium dû s'intéresser au codio.
	// Comprenant son potentiel brut, on lui confia vite une tâche à sa hauteur.
	// Le voilà chargé désormais de gérer l'interaction entre les différentes classes d'une application tout aussi insignifiante,
	// mais ayant toutefois l'intérêt d'occupé le petit excité
	// Dès lors, le codio répond au nom de 'Commandator'
	//
	//	Selon une étude très sérieuse, il a été estimé à moins d' 1 minute, le temps perdu à lire ces commentaires superflus ayant pour seul objectif de satisfaire les facéties de son auteur :D

	// Moi aussi j't'aime bien Jerem ;^^

class Commandator	{
	private $_connect;

	// ___ BULLDOZER ___
	public function __construct($connect)	{
	$this->setBipBip($connect);
	}

	// ___ FONCTIONS COURANTES ___
	public function setBipbip(PDO $connect)	{
		$this->_connect = $connect;
	}

	public function count()	{
		return $this->_connect->query('SELECT COUNT(*) FROM recette')->fetchColumn();
	}

	public function dasBin($verif)	{
		if (is_int($verif))	{
			return (bool) $this->_connect->query('SELECT COUNT(*) FROM recette WHERE idR = '.$verif)->fetchColumn();
		}

		$req = $this->_connect->prepare('SELECT COUNT(*) FROM recette WHERE intit = :intit');
		$req->execute([':intit' =>$verif]);
		return (bool) $req->fetchColumn();
 		}

	public function add (Recette $mat)	{
		$req = $this->_connect->prepare('INSERT INTO recette(intit) VALUES(:intit)');
		$req->bindvalue(':intit', $mat->intit());
		$req->execute();

		$mat->inject([
			'idR'=>$this->_connect->lastInsert(),
			'intit'=> "Titre",
			'nbIng'=> 1,
			'nbAgr'=> 0,
			'realiz'=> "test",
		]);
	}

	public function get($info)	{
		$req = $this->_connect->prepare('SELECT idR, intit, realiz FROM recette WHERE intit = :intit;');
		$req->execute([':intit' =>$info]);
		return new Recette($req->fetch(PDO::FETCH_ASSOC));
	}

	public function liRe()	{
		$liRe = [];
		$req = $this->_connect->prepare('SELECT idR, intit FROM recette ORDER BY intit;');
		$req->execute();
		while ($dataR = $req->fetch(PDO::FETCH_ASSOC))	{
			$liRe[] = new Recette($dataR);
		}
		return $liRe;	}

	public function liIn()	{
		$liIn = [];
		$req = $this->_connect->prepare('SELECT lib FROM ingredient ORDER BY lib;');
		$req->execute();
		while ($dataI = $req->fetch(PDO::FETCH_ASSOC))	{
			$liIn[] = new Ingredient($dataI);
		}
		return $liIn;	}

	public function liOr()	{
		$liOr = [];
		$req = $this->_connect->prepare('SELECT DISTINCT pays FROM origine ORDER BY pays');
		$req->execute();
		while ($dataO = $req->fetch(PDO::FETCH_ASSOC))	{
			$liOr[] = new Origine($dataO);
		}
		return $liOr;	}

	public function details($id)	{
		$detR;
		$req = $this->_connect->prepare('SELECT * FROM det1 WHERE idR = :tag');
		$req->execute([':tag' => $id]);
		while ($dataR = $req->fetchAll(PDO::FETCH_ASSOC)) {
			$detR = $dataR;
		}
		return $detR;
	}
}
