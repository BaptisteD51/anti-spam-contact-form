<form action="processing.php" method="post">

    <div>
        <label for="nom">Votre nom</label>
        <input type="text" name='nom' id='nom' required>
    </div>
    
    <div>
        <label for="miel">Votre texte</label>
        <input type="text" name='miel' id='miel'>
    </div>

    <div>
        <label for="courriel">Votre adresse Email</label>
        <input type="email" name='courriel' id='courriel' required>
    </div>

    <div>
        <label for="texte">Votre message</label>
        <textarea name="texte" id="texte" required></textarea>
    </div>

    <div class='captcha'>
        <img src="images/<?php echo $number1->file_name; ?>" alt="captcha">
        <img src="images/plus.png" alt="captcha">
        <img src="images/<?php echo $number2->file_name; ?>" alt="captcha">
        <img src="images/egal.png" alt="captcha">
        <input type="number" name="nombre" id="nombre">
    </div>

    <div>
        <input type="submit" value="Envoyer">
    </div>
    
</form>