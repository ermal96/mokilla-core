<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin/partials
 */

$inserter = '<svg aria-hidden="true" role="img" focusable="false" class="dashicon dashicons-insert" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1c-5 0-9 4-9 9s4 9 9 9 9-4 9-9-4-9-9-9zm0 16c-3.9 0-7-3.1-7-7s3.1-7 7-7 7 3.1 7 7-3.1 7-7 7zm1-11H9v3H6v2h3v3h2v-3h3V9h-3V6z"></path></svg>';

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="mokilla-user-readme">
	<h1><a name="top-user-guide">Guida utente</a></h1>

	<p>Questo documento ha lo scopo di introdurre l'utente al funzionamento del software custom creato per il progetto,
		basato su CMS WordPress alla versione 4.9.8.</p>

	<h2>Indice dei contenuti</h2>

	<ol>
		<li><h3><a href="#title-setup-di-base">Setup di base del tema</a></h3>

			<ol>
				<li>Check dei requisiti</li>

				<li>Organizzazione dei contenuti</li>

			</ol>
		</li>

		<li><h3><a href="#title-introduzione-editor">Introduzione al nuovo editor</a></h3>
			<ol>
				<li><h3><a href="#title-mappa-blocchi-post">Mappa dei blocchi per un articolo</a></h3></li>

				<li><h3><a href="#title-mappa-blocchi-page">Mappa dei blocchi per una pagina</a></h3></li>

				<li><h3><a href="#title-blocchi-riutilizzabili">Blocchi riutilizzabili</a></h3></li>
			</ol>
		</li>

		<li><h3><a href="#title-creazione-articolo">Creazione di un articolo</a></h3></li>

		<li><h3><a href="#title-creazione-menu">Gestione del menu</a></h3></li>

		<li><h3><a href="#title-configurazione-funzionalita">Configurazione delle funzionalità</a></h3>
			<ol>
				<li>Inserimento dei link social</li>

				<li>Inserimento degli indirizzi email di riferimento</li>
			</ol>
		</li>
	</ol>

	<hr>

	<ol>
		<li><h2><a name="title-setup-di-base">Setup di base del tema</a></h2>
			<ol>
				<li><b>Check dei requisiti</b> Il sito è stato consegnato con la più aggiornata installazione di
					WordPress disponibile e stabile,
					e con la predisposizione agli ultimi sviluppi che garantiscono maggiore longevità al progetto. E'
					importante che per il corretto funzionamento del sito, rimangano attivati i
					seguenti plugin:
					<ul>
						<li>Gutenberg</li>

						<li>[Elencare plugin]</li>

					</ul>

					<p>Per quanto riguarda il plugin Gutenberg, verrà presto integrato all'interno del core di
						Wordpress, quindi sarà rimosso quando
						necessario.</p>

					<div class="importante"><p class="title">Importante:</p>
						il tema supporta l'utilizzo di immagini svg, ma Wordpress ha un bug di visualizzazione nelle
						pagine amministrative.
						Nel frontend invece le immagini vengono correttamente visualizzate.
					</div>
				</li>

				<li><b>Organizzazione dei contenuti</b> La struttura di Wordpress è stata ampliata ed adattata alle
					necessità del sito, in particolare:
					<ul>
						<li>nella sezione Pagine si creano le pagine come About Us e Aiuto</li>

						<li>nella sezione Articoli si creano i singoli articoli</li>

						<li>[Spiegare eventuali tassonomie create per il progetto]</li>
						</li>
					</ul>

				</li>
			</ol>

			<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
		</li>

		<li><h2><a name="title-introduzione-editor">Introduzione al nuovo editor</a></h2>
			<p>All'interno delle sezioni che permettono di inserire contenuti (Articoli, Pagine), questi ultimi devono essere inseriti
				tramite il nuovo sistema a blocchi denominato Gutenberg e sviluppato dall'azienda dietro WordPress
				stesso. Questa feature è in sviluppo da più di un anno, ormai è matura e verrà integrata in WordPress
				nella prossima major release, portando un sostanziale rinnovamento alla sezione più importante del
				sistema.
			</p>
			<p>Quando si è in una pagina di editor (per esempio in un nuovo post), si possono inserire delle strutture
				di contenuto denominate <strong>blocchi</strong>, che in questo caso sono stati sviluppati secondo la
				grafica proposta e con le funzionalità specifiche necessarie.
				Tramite l'icona col simbolo <?php echo $inserter; ?> in alto a destra è possibile aprire il menù dei
				blocchi, dove compaiono solamente quelli utilizzabili nello specifico tipo di contenuto che si sta
				creando. I blocchi realizzati per questo progetto sono racchiusi all'interno di una propria categoria e
				sono accompagnati dall'icona del progetto.
			</p>

			<p>
				Cliccando su un blocco, questo verrà inserito nell'editor, e nella colonna di destra si aprirà un menù
				dove viene riportato il nome del blocco, una piccola descrizione e le impostazioni configurabili per
				quel blocco.
				<br>A seconda della funzionalità del blocco sarà possibile scrivere direttamente nel blocco, e
				potrebbero esserci delle impostazioni nel menù a destra che permettono ulteriori configurazioni.</p>

			[<p class="importante" style="border: 2px dotted #41484d;">Alcuni blocchi saranno mostrati con un bordo scuro
				tratteggiato (proprio come attorno a questo contenuto!): quel tipo di blocchi serve per inserire
				delle informazioni di corredo al post, possono essere inseriti una sola volta e il loro contenuto non
				viene visualizzato nella pagina insieme ai contenuti standard, quindi il loro ordine all'interno
				dell'editor non ha impatto sull'impaginazione.<br>
				Troverai questi blocchi già presenti di default quando crei un nuovo contenuto, ma se li cancelli per
				sbaglio puoi sempre ritrovarli nel menù che si apre tramite il simbolo <?php echo $inserter; ?> in alto
				a sinistra.
			</p>]

			<p>Questo nuovo editor permette un'esperienza molto guidata per l'inserimento dei contenuti, e dà già una
				prima impressione di come verrà impaginato il contenuto, ma per vedere la reale impaginazione è sempre
				bene visionare l'anteprima dell'articolo prima di pubblicarlo.</p>

			<ol>
				<li><h2><a name="title-mappa-blocchi-post">Mappa dei blocchi per un articolo</a></h2>
					<p>Il tipo di contenuto "Articolo" ha a disposizione solo e soltanto il set di blocchi necessari per
						ricreare la grafica approvata, ovvero:</p>
					<ul>
						<li>[Nome blocco e codice numerico]: [Descrizione riportata in gutenberg, più altre spiegazioni delle funzioni]</li>
					</ul>
					<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
				</li>

				<li><h2><a name="title-mappa-blocchi-page">Mappa dei blocchi per una pagina</a></h2>
					<p>Anche il tipo di contenuto "Pagina" ha a disposizione solo e soltanto il set di blocchi necessari per
						ricreare la grafica approvata, ovvero:</p>
					<ul>
						<li>[Nome blocco e codice numerico]: [Descrizione riportata in gutenberg, più altre spiegazioni delle funzioni]</li>
					</ul>
					<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
				</li>

				<li><h2><a name="title-blocchi-riutilizzabili">Blocchi riutilizzabili</a></h2>
					<p>Nel menù dei blocchi è presente una categoria denominata "Riutilizzabile", dove vengono salvati blocchi
						(compresi di contenuto) che si intende riutilizzare in altri contenuti.</p>
					<p class="importante">Importante: questa categoria si attiva solo quando ha blocchi da poter presentare,
						altrimenti non compare nel menù. Per esempio, dopo aver inserito il blocco e i relativi contenuti, cliccando sul menù del singolo
						blocco che compare a sinistra (icona con i tre pallini), è possibile salvarlo nei blocchi
						riutilizzabili.</p>
				</li>
			</ol>

			<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
		</li>

		<li><h2><a name="title-creazione-articolo">Creazione di un articolo</a></h2>
			Tramite il pannello amministrativo, andare su Articoli -> Aggiungi nuovo.<br>
			[Inserire informazioni sull'eventuale template]
			<br><br><strong>Elementi necessari per il corretto setup di un articolo:</strong>
			<ul>
				<li>Tramite la colonna di destra, sezione Documento, inserire:
					<ul>
						[<li>Immagine in evidenza: è l'immagine che verrà visualizzata insieme al titolo dell'articolo in
							ogni parte del sito
						</li>]

					</ul>
				</li>

				<li>Inserimento dei blocchi tramite il pulsante <?php echo $inserter; ?> in alto a sinistra: scegliere
					il blocco desiderato in base all'impaginazione che si vuole creare. Ogni blocco potrebbe offrire
					delle ulteriori impostazioni nella barra di destra sotto il titolo "Informazioni aggiuntive"
					<br>
					<div class="importante"><p class="title">Importante:</p>
						<ul>
							<li>[Inserire eventuali informazioni, come trasformazioni o casi particolari di utilizzo]
							</li>
						</ul>
					</div>
				</li>
			</ul>
			<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
		</li>

		<li><h2><a name="title-creazione-menu">Gestione del menu</a></h2>
			<p>Nel tema sono stati resi disponibili [3] posti per menù configurabili tramite il pannello di WordPress:</p>
			<ul>
				<li>[Inserire il nome del menù e spiegarlo]</li>
			</ul>
			<p>
				Tramite il pannello amministrativo cliccare su Aspetto -> Menu.
				<br>
				Come prima cosa selezionare il menu da modificare, e quindi procedere con la modifica e il salvataggio
				del singolo menù.
			</p>

			[<div class="importante"><p class="title">Importante:</p>
				<p>Alcune voci di menù sono dei link fissi che devono rimanere tali per permettere agli utenti di
					raggiungere quelle pagina, in particolare:</p>
				<ul>
					<li>[Elencare link fissi]</li>
				</ul>
			</div>]
			<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
		</li>

		<li><h2><a name="title-configurazione-funzionalita">Configurazione delle funzionalità</a></h2>
			<ol>
				<li>
					<b>Inserimento dei link social</b> Tramite il pannello amministrativo, andare su Links, ed inserire
					i
					link elencati, quando presenti. Questi link verranno usati nelle sezioni del sito dove sono state
					previste le icone social (menu e in basso nella pagina)
				</li>

				<li><b>Inserimento degli indirizzi email di riferimento</b> Per eseguire questa operazione sono stati
					messi a disposizione due menu, Change WP Email e Contacts. Visitare entrambi e seguire le istruzioni
					per inserire i propri indirizzi email.
				</li>

				<li>[Elencare altre funzionalità incluse]</li>

			</ol>
			<p class="top-link"><a href="#top-user-guide">Torna in cima</a></p>
		</li>

	</ol>
</div>