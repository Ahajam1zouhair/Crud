<!DOCTYPE html>
<html>
<head>
  <title>Ma page avec une icône de coche circulaire</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" /> <!-- Assurez-vous d'inclure le lien vers la bibliothèque Font Awesome -->
  <style>
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      width: 100vw;
      height: 100vh;
    }

    .icon {
      width: 400px;
      height: 300px;
    }
    
    .button {
  margin-top: 20px;
  background-color: rgb(51, 132, 207); /* Couleur du bouton */
  color: white; /* Couleur du texte */
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
}

    
  </style>
</head>
<body>
  <div class="container">
      <svg role="img" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-check" class="svg-inline--fa fa-circle-check fa-6x icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="green" d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"></path>
        </svg>
        <p>Vous avez été enregistré avec succès </p>
        <a href="TABLE.php" class="button"> Continuer</a>
  </div>
</body>
</html>