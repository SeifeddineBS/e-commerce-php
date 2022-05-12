<?php
require_once "../../db_connnection.php";
require_once "../model/reponse.php";
class reclamationC
{
	public function afficherrec()
	{
		$sql = "SELECT * FROM reclamations";
		$db = config::getConnexion();
		try {
			$listerec = $db->query($sql);
			return $listerec;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}
	function supprimerrec($id_reclamation)
	{
		$sql = "DELETE FROM reclamations WHERE id_reclamation=:id_reclamation";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_reclamation', $id_reclamation);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}


	// $GLOBALS['Reclammation'][phpAds_actionAdvertiserReportMailed] = "Notification d'activation de la campagne {id_reclammation} envoyée par e-mail";


	// $GLOBALS['Reclammation'][phpAds_actionActiveCampaign] = "Notification d'activation de la campagne {id_reclammation} envoyée par e-mail";

	// $GLOBALS['Reclammation'][phpAds_actionAutoClean] = "Notification d'activation de la campagne {id_reclammation} envoyée par e-mail";



	public function ajouterrec($reclamation)
	{
		$sql = "insert into reclamations(type_reclamation,message) 
			values (:type_reclamation,:message)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([

				'type_reclamation' => $reclamation->gettype_reclamation(),
				'message' => $reclamation->getmessage(),
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererreclamation($id_reclamation)
	{
		$sql = "SELECT * from reclamations where id_reclamation=:id_reclamation";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->bindValue(':id_reclamation', $id_reclamation);
			$query->execute();
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}


	function getrecbyid($id)
	{
		$requete = "select * from reclamations where id_reclamation=:id";
		$config = config::getConnexion();
		try {
			$querry = $config->prepare($requete);
			$querry->execute(
				[
					'id' => $id
				]
			);
			$result = $querry->fetch();
			return $result;
		} catch (PDOException $th) {
			$th->getMessage();
		}
	}
	// /STATISTIQUE:

	// if (isset($_GET['Reclammation']) && (empty($_GET['details']) || !filter_var($_GET['details'],FILTER_VALIDATE_BOOLEAN))) {
	//     $statistiqueQuery = $bdd->query('SELECT *
	// 			FROM monte 
	//             where Reclammation='.$_GET['Reclammation']);

	function modifierrec($reclamation, $id_reclamation)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'
					UPDATE reclamations SET 
						type_reclamation= :type_reclamation, 
						message=:message 
						
					WHERE id_reclamation= :id_reclamation'
			);
			$query->execute([
				'type_reclamation' => $reclamation->gettype_reclamation(),
				'message' => $reclamation->getmessage(),
				'id_reclamation' => $id_reclamation,
			]);
			//	echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
	function afficherTrier()
	{
		$sql = 'SELECT * FROM reclamations ORDER BY type_reclamation ASC  ';
		$db = config::getConnexion();

		try {
			$list = $db->query($sql);
			return ($list);
		} catch (Exception $e) {
			echo 'Erreur' . $e->getMessage();
		}
	}
	function recherchereclamation($type_reclamation, $message)
	{
		$sql = "SELECT * FROM reclamations where type_reclamation like '" . $type_reclamation . "' or message like '" . $message . "'";
		$db = config::getConnexion();

		try {

			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMeesage());
		}
	}
	function traiterReclamation($id)
	{
		$sql = "UPDATE reclamations SET status=:status  WHERE id_reclamation=:id";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try {
			$req = $db->prepare($sql);



			$req->bindValue(':id', $id);

			$req->bindValue(':status', "Oui");






			$s = $req->execute();

			// header('Location: index.php');
		} catch (Exception $e) {
			echo " Erreur ! " . $e->getMessage();
			echo " Les datas : ";
		}
	}
}
