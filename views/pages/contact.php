<?php require_once ('../../views/components/header.php');?>
    <main>
        <section class="formulaire">
            <div class="contactez-nous">
                <h2>Contactez-nous</h2>
                <p>Un problème, une question, envie de nous envoyer un message d’amour ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
                <form action="/page-traitement-donnees" method="post">
                    <div>
                        <label for="nom">Votre nom</label>
                        <input type="text" id="nom" name="nom" placeholder="Mon nom" required>
                    </div>
                    <div>
                        <label for="email">Votre e-mail</label>
                        <input type="email" id="email" name="email" placeholder="monadresse@mail.com" required>
                    </div>
                    <div>
                        <label for="sujet">Quel est le sujet de votre message ?</label>
                        <select name="sujet" id="sujet" required>
                            <option value="">Choisissez le sujet de votre message</option>
                            <option value="1">Problème avec mon compte</option>
                            <option value="2">Question à propos d'un produit</option>
                            <option value="3">Suivi de ma commande</option>
                            <option value="4">Autre...</option>
                        </select>
                    </div>
                    <div>
                        <label for="message">Votre message</label>
                        <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
                    </div>
                    <div>
                        <button class="envoyer" type="submit">Envoyer mon message</button>
                    </div>
                </form>
            </div>
            <div>
                <img class="erenpotter2" src="../../asset/img/personnage/erenpotter2.jpg" alt="photo-erenpotter">
            </div>
        </section>
    </main>
<?php  require_once '../../views/components/footer.php';?>