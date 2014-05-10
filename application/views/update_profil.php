<!DOCTYPE html>
<html lang="en">

<head></head>

<body>

	<form method="post" action="">
		<label for="hobbies">Hobbies :</label>
		</br>
		<textarea name="hobbies" rows="4" cols="50">
		</textarea>
		</br>

		<label for="interest">Interesse par :</label>
		<input type="radio" id="rad1" name="interest" value="Male" />
		<label for="rad1">Hommes</label>
		<input type="radio" id="rad2" name="interest" value="Female" />
		<label for="rad2">Femmes</label>
		<input type="radio" id="rad3" name="interest" value="Both" />
		<label for="rad2">Les deux</label>
		</br>

		<label for="situation">Situation :</label>
		<input type="radio" id="rad1" name="situation" value="In couple" />
		<label for="rad1">En couple</label>
		<input type="radio" id="rad2" name="situation" value="Single" />
		<label for="rad2">Celibataire</label>
		</br>

		<label for="sexuality">Sexualite :</label>
		<input type="radio" id="rad1" name="sexuality" value="Heterosexuel" />
		<label for="rad1">Heterosexuel</label>
		<input type="radio" id="rad2" name="sexuality" value="Homosexuel" />
		<label for="rad2">Homosexuel</label>
		<input type="radio" id="rad3" name="sexuality" value="Bisexuel" />
		<label for="rad2">Bisexuel</label>
		</br>	

		<label for="job">Travail :</label>
		<input type="text" name="job" value=""/>
		</br>

		<label for="description">Description :</label>
		</br>
		<textarea name="description" rows="4" cols="50">
		</textarea>
		</br>

		<input type="submit" value="Envoyer" />
	</form>
</body>
</html>