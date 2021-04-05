<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Ajax démo</title>
  
  <style>
  body 
  {
     margin: 10px;
  }

  #div1 
  {
    border: 1px solid #000; 
  	margin: 10px;
  	padding: 10px;
  }
  </style>
</head>
<body> 
	 <button id="button1" class="btn btn-primary">1 - Méthode load()</button>

	 <button id="button2" class="btn btn-primary">2 - Méthode get()</button>

	 <button id="button3" class="btn btn-primary">3 - Méthode low level - ajax()</button>

	 <button id="button4" class="btn btn-primary">4 - Méthode post()</button>

	 <button id="button5" class="btn btn-primary">5 - Json (fichier)</button>
	 
	<button id="button6" class="btn btn-primary">6 - Json (PHP)</button>

	 <div id="div1">Ce contenu initial va être mis à jour via Ajax. Cliquer sur un bouton.</div>
	
	<!--  Attention : Jquery sans slim sinon Ajax ne fonctionne pas -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>