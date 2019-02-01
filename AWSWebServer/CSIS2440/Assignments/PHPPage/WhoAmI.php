<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WhoAmI</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
        <div class="row container">
            <br />
            <br />
            <h1 class="center-align">Who Am I?</h1>
            <br />
            <form class="col s12 center-align" method="post" action="WhoYouAre.php">
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" name="Name" />
                  <label for="icon_prefix">Name</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">cake</i>
                  <input id="age" type="number" name="Age" />
                  <label for="age">Age</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s6">
                  <i class="material-icons prefix">location_on</i>
                  <input id="address" type="text" name="Address" />
                  <label for="address">Address</label>
                </div>
                <div class="input-field col s6">
                  <i class="material-icons prefix">location_city</i>
                  <input id="state" type="text" name="State" />
                  <label for="state">State</label>
                </div>
              </div>
              <p>
                <label> Sex:
                  <br />
                  <input type="radio" value="F" name="Gender" checked>
                  <span>F</span>
                </label>
              </p>
              <p>
                <label>
                  <input type="radio" value="M" name="Gender">
                  <span>M</span>
                </label>
              </p>
              <br />
              <input class="waves-effect waves-light btn" type="submit" name="Submit" value="Submit" />
            </form>
          </div>    

        <!-- Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>         
    </body>
</html>
