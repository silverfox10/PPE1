<!DOCTYPE html>
<?php
  $connexion = new PDO('mysql:host=localhost;dbname=ppe-cashcash','root');

  $reqIntervention = $connexion -> query('SELECT NumInterv FROM intervention')

?>




<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CashCash</title>
  </head>

  <body>
      <header>
          <h1>CashCash</h1>
      </header>

      <nav>

      </nav>








      <table>

        <thead>
          <tr>
            <th scope="col"><input type="text" name="numero" value="" placeholder="N°"></th>
            <th scope="col"><input type="text" name="numero" value="" placeholder="Date affection"></th>
            <th scope="col"><input type="text" name="numero" value="" placeholder="Date fin"></th>
            <th scope="col"><input type="text" name="numero" value="" placeholder="Priorité"></th>
            <th scope="col"><input type="button" name="" value="Recherche"></th>
          </tr>
        </thead>

        <?php
          while($affiche = $reqIntervention -> fetch()){
        ?>
          <tr>
            <td><?php echo $affiche ?></td>
          </tr>

        <?php
        }
        ?>

      </table>

  </body>
</html>
