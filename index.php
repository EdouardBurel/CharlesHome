<?php include 'templates/header.php' ?>
    <main>
        <div class="container">
            <img class="imgApart" src="image/original.jpg" alt="Apartment">
            <div class="centered">
                <h3>Apartment name</h3>
            </div>
        </div>

        <div class="container cards mt-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm54.2 253.8c-6.1 20.3-24.8 34.2-46 34.2H80c-8.8 0-16-7.2-16-16s7.2-16 16-16h8.2c7.1 0 13.3-4.6 15.3-11.4l14.9-49.5c3.4-11.3 13.8-19.1 25.6-19.1s22.2 7.7 25.6 19.1l11.6 38.6c7.4-6.2 16.8-9.7 26.8-9.7c15.9 0 30.4 9 37.5 23.2l4.4 8.8H304c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-6.1 0-11.6-3.4-14.3-8.8l-8.8-17.7c-1.7-3.4-5.1-5.5-8.8-5.5s-7.2 2.1-8.8 5.5l-8.8 17.7c-2.9 5.9-9.2 9.4-15.7 8.8s-12.1-5.1-13.9-11.3L144 349l-9.8 32.8z"/></svg>
                    About your stay
                    </h5>
                </div>
                <div class="card-body text-secondary">
                    <p class="card-text mb-1">- Rental lease (PDF)</p>
                    <p class="card-text mb-1">- Start date: dd/mm/yy</p>
                    <p class="card-text mb-1">- End date: dd/mm/yy</p>
                    <p class="card-text mb-1" onclick="showExtensionForm();">- <a href="#">Lease extension request</a></p>
                </div>
            </div>

                <div class="card border-secondary mb-3">
                    <div class="card-header">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>
                        Invoices
                        </h5>
                    </div>
                    <div class="card-body text-secondary">
                    <a href="index2.php" class="card-text">View your rental invoices.</a>
                    </div>
                </div>


            <div class="card border-success mb-3">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                     Useful Information
                </h5>
                <div class="card-body text-secondary">
                    <a href="docs/calendar_Montagne.pdf">Waste collect calendar (PDF)</a>
                    <p class="card-text">Apartment inventory.</p>
                    <p class="card-text">Cleaning service</p>
                </div>
            </div>


            <div class="card border-danger mb-3">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                    Emergency</h5>
                <div class="card-body text-danger">
                <p class="card-text"> - Cannot access the apartment?</p>
                <p class="card-text"> - No hot water?</p>
                </div>
            </div>
        </div>
        <div id="overlay" class="overlay">
            <div class="modal">
                <form>
                    <label class="labelDate" for="startDate">Start date extension:</label>
                    <input type="date" id="startDate" name="startDate" required>
    
                    <label class="labelDate" for="endDate">End date extension:</label>
                    <input type="date" id="endDate" name="endDate" required>
    
                    <input type="submit" value="Send">
                    <button type="button" onclick="closeExtensionForm();">X</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-3 d-flex align-items-center">
          <span class="mb-2 mb-md-0" style="color:#fff">© 2023 Charles Home. All rights reserved</span>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <a href="https://www.charleshome.com/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <img src="image/logo-key.png" alt="CHARLES HOME" width="30px">
              </a>
        </div>
        <div class="col-md-3 d-flex align-items-center justify-content-end">
            <span class="mb-2 m-md-1" style="color:#fff">contact@charleshome.com</span>
          </div>
      </footer>

<script src="script.js"></script> 
</body>
</html>