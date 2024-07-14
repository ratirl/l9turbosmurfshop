 <!--                                            ADMIN GEDEELTE START                -->  
            <div class="container">
               <h4>Een product toevoegen (admin gedeelte)</h4>
               <form action="upload.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <label>Naam:</label>
                     <br>
                     <input type="text" name="naam"/>
                  </div>
                  <div class="form-group">
                     <label>Prijs:</label>
                     <br>
                     <input type="text"  name="prijs">
                  </div>
                  <div class="form-group">
                     <label>Categorie:</label>
                     <br>
                     <input type="text"  name="categorie">
                  </div>
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" name="uitlichten">
                     <label class="form-check-label">Uitlichten</label>
                  </div>
                  <label for="bestand">Foto:</label>
                  <input type="file" name="bestand" id="bestand"/>
                  <div>
                     <input type="submit" value="Verstuur">
                  </div>
               </form>
            </div>
            <!--                                            ADMIN GEDEELTE END                -->  