<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scratchpad
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );


			endwhile; // End of the loop.
			?>

		</main><!-- #main -->

		<!-- ENCARTS -->
		<!-- French -->
		<?php if (ICL_LANGUAGE_CODE == 'fr') : ?>
		<div class="uc-container">
			<div class="div-uc">
					<h2>Ce que vous devez savoir sur NousCitoyens:</h2>
					<details>
					  <summary>En savoir plus sur la sphère politique ? Essayez nos outils !</summary>
					  <ul class="expand">
					  <li>Vous voulez vous informer sur un acteur politique en particulier ? Voyez notre <a class="expandlink" title="Répertoire Politique" href="/?page_id=1308">Répertoire Politique</a>.
					  <li>Vous voulez identifier les hommes politiques favorables à une question précise ? Faites une <a class="expandlink" title="Répertoire Politique" href="/?page_id=1308">recherche avancée</a> dans le Répertoire Politique.
					  <li>Lors des élections, voulez savoir qui pense comme vous ? Testez notre <a class="expandlink" title="GPS électoral" href="/?page_id=8258">GPS Électoral.</a>
					  </ul>
					  <a class="expandbutton" title="Outils" href="/?page_id=8258">Voir la liste des outils</a>
					</details>
					<details>
					  <summary>Réalisez votre investissement le plus rentable. Faites un don.</summary>
					  <ul class="expand">
					  <li>Votre don ou votre cotisation de membre contribue à une meilleure gestion de l’État. Lorsque les responsables politiques constatent que nous nous intéressons à leur travail, ils donnent le meilleur d’eux-mêmes.
					  <li>Restez informés de nos actions : souscrivez à la <a class="expandlink" title="Newsletter" href="/?page_id=568">newsletter</a>.
					  </ul>
					  <a class="expandbutton" title="Don" href="/?page_id=35">Je fais un don maintenant</a>
					</details>
					<details>
					  <summary>Vous êtes pour la transparence ? Contribuez-y !</summary>
					  <ul class="expand">
					  <li>Faites-vous entendre : participez et soutenez les campagnes.
					  Vous ne trouvez pas la question politique qui vous tient à cœur ? Commander un sondage des
					  acteurs politiques.
					  <li>Vous avez un dossier sur un cas de gestion publique et vous voudriez donner l’alerte ? Prenez contact avec notre rédacteur en chef <a class="expandlink" title="Mail" href="mailto:pinon@wecitizens.be">(pinon@wecitizens.be)</a>.
					  <li>Vous possédez des informations qui manquent dans le Répertoire Politique ? Signalez-le au rédacteur en chef ou via le formulaire anonyme que vous trouvez au pied de chaque profil personnel.
					  </ul>
					  <!-- LINK TO DO -->
					  <a class="expandbutton" title="Questions" href="">Voir la liste des question politiques</a>
					</details>
					<details>
					  <summary>Enfin un observatoire citoyen de la gestion publique en Belgique. </summary>
					  <ul class="expand">
					  <li>Nous Citoyens se profile observatoire de la gestion publique
					  <li>Nous publions une revue trimestrielle des réformes fiscales, le <a class="expandlink" title="FiscoFlash" href="/?s=fiscoflash">FiscoFlash</a>.
					  <li>Dans nos newsletters nous livrons des <a class="expandlink" title="GPS électoral" href="/?page_id=24">analyses politiques</a>.
					  <li>Nous avons le projet de publier des articles sur des cas intéressants de gestion publique.
					  </ul>
					</details>
			</div>
		</div>
		<?php endif; ?>
		<!-- Dutch -->
		<?php if (ICL_LANGUAGE_CODE == 'nl') : ?>
		<div class="uc-container">
			<div class="div-uc">
					<h2>Wat u moet weten over WijBurgers:</h2>
					<details>
					  <summary>Meer weten over de politici? Probeer onze tools! </summary>
					  <ul class="expand">
					  <li>Zoek je informatie over een welbepaalde politicus? Bekijk dan onze <a class="expandlink" title="Politieke Databank" href="/?page_id=1311">Politieke Databank</a>.
					  <li>Wil je de politici leren kennen die een bepaalde opvatting steunen? Doe een <a class="expandlink" title="geavanceerde opzoeking" href="/?page_id=1311">geavanceerde opzoeking</a> in de Politieke Databank.
					  <li>Wil je bij de verkiezingen weten wie jouw opvattingen deelt? Gebruik onze <a class="expandlink" title="Kieswijzer" href="/?page_id=272">Kieswijzer</a>
					  </ul>
					  <a class="expandbutton" title="Tools" href="/?page_id=8257">Bekijk de lijst met tools</a>
					</details>
					<details>
					  <summary>Doe je rendabelste investering. Doe een gift.</summary>
					  <ul class="expand">
					  <li>Jouw gift, lidgeld of jouw vrijwilligerswerk draagt bij tot een beter bestuur van de staat. Wanneer de beleidsverantwoor­delijken vaststellen dat we ons voor hun werk interesseren, geven ze het beste van zichzelf.
					  <li>Blijf op de hoogte van onze acties: schrijf je in op de <a class="expandlink" title="nieuwsbrief" href="/?page_id=8400">nieuwsbrief</a>.
					  </ul>
					  <a class="expandbutton" title="Gift" href="/?page_id=8398">Ik doe nu een gift.</a>
					</details>
					<details>
					  <summary>Ben jij voor transparantie? Help ons daarbij!</summary>
					  <ul class="expand">
					  <li>Laat van je horen: neem deel aan en steun de <a class="expandlink" title="Campagnes" href="/?page_id=9443">campagnes</a>.
					  <li>Staat het politiek onderwerp dat je aan het hart ligt, niet in onze lijst? Bestel een peiling van de politici.
					  <li>Heb je een dossier over openbaar bestuur dat je wil melden? Neem contact op met onze hoofdredacteur<a class="expandlink" title="Mail" href="mailto:pinon@wecitizens.be">(pinon@wecitizens.be)</a>.
					  <li>Beschik je over gegevens die in de Politieke Databank ontbreken? Meld het bij onze hoofdredacteur of via het anonieme formulier dat je onderaan ieder persoonlijk profiel vindt.
					  </ul>
					  <!-- LINK TO DO -->
					  <a class="expandbutton" title="Vragen" href="">Bekijk de lijst met politieke vragen.</a>
					</details>
					<details>
					  <summary>Eindelijk een burgerobservatorium van het openbaar bestuur in België. </summary>
					  <ul class="expand">
					  <li>WijBurgers profileert zich als een observatorium van het openbaar beheer.
					  <li>We publiceren een trimestrieel tijdschrift met fiscale hervormingen, de <a class="expandlink" title="FiscoFlash" href="/?s=fiscoflash">FiscoFlash</a>.
					  <li>In onze nieuwsbrieven brengen we politieke analyses naar voor.
					  <li>We hebben het voornemen om artikels over interessante gevallen van openbaar bestuur te publiceren.
					  </ul>
					</details>
			</div>
		</div>
		<?php endif; ?>

		<!-- END OF ENCARTS -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
