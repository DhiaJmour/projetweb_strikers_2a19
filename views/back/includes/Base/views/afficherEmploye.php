<?PHP
include "../core/employeC.php";
$Admin1C=new AdminC();
$listeEmployes=$Admin1C->afficherAdmins();

//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>Cin</td>
<td>Nom</td>
<td>Prenom</td>
<td>nb heures</td>
<td>tarif horaire</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeEmployes as $row){
	?>
	<tr>
	<td><?PHP echo $row['Usernames']; ?></td>
	<td><?PHP echo $row['Email']; ?></td>
	<td><?PHP echo $row['Password']; ?></td>
	<td><form method="POST" action="supprimerEmploye.php">
	<input type="submit" name="supprimer" value="supprimer">
	
	</form>
	</td>
	<td><a href="modifierEmploye.php?cin=<?PHP echo $row['cin']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


