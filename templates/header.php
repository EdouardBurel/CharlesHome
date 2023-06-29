<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <?php
                $id = (int)$_SESSION['user_id'];
                $query = "SELECT * FROM user WHERE id = ?";
                $res = $pdo->prepare($query);
                $res->execute([$id]);

                $user = $res->fetch(PDO::FETCH_ASSOC);

                $reservationName = (string)$user['firstName'].' '.(string)$user['lastName'];

                echo <<<HTML
              <img src="image/logo_charles-home.png" alt="CHARLES HOME">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText" style="display: flex;justify-content: space-between;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Your stay</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color:red">Emergency</a>
                  </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Se déconnecter</a>
                    </li>
                </ul>
                <span class="helloText navbar-text">
                    Hello $reservationName !
                </span>
              </div>
            </div>
            HTML;
            ?>
        </nav>
    </header>

   