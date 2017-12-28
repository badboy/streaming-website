<?php

$CONFIG['CONFERENCE'] = array(
	/**
	 * Der Startzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns davor, wird die Closed-Seite
	 * mit einem Text der Art "hat noch nicht angefangen" angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, gilt die Konferenz immer als angefangen. (Siehe aber ENDS_AT
	 * und CLOSED weiter unten)
	 */
	'STARTS_AT' => strtotime("2017-12-27 18:00"),

	/**
	 * Der Endzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns danach, wird eine Danke-Und-Kommen-Sie-
	 * Gut-Nach-Hause-Seite sowie einem Ausblick auf die kommenden Events angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, endet die Konferenz nie. (Siehe aber CLOSED weiter unten)
	 */
	'ENDS_AT' => strtotime("2017-12-30 20:00"),

	/**
	 * Hiermit kann die Funktionalitaet von STARTS_AT/ENDS_AT überschrieben werden. Der Wert 'before'
	 * simuliert, dass die Konferenz noch nicht begonnen hat. Der Wert 'after' simuliert, dass die Konferenz
	 * bereits beendet ist. 'running' simuliert eine laufende Konferenz.
	 *
	 * Der Boolean true ist aus Abwärtskompatibilitätsgründen äquivalent zu 'after'. False ist äquivalent
	 * zu 'running'.
	 */
	 #'CLOSED' => true,

	/**
	 * Mit diesem Schalter kann die Veranstaltung von der Startseite und der API
	 * versteckt werden, ist aber dennoch über ihre URL verfügbar.
	 *
	 * Dies ist z.B. nützlich um eine kleinere Streamingseite für Übersetzer
	 * bereit zu stellen. Werte: true|false Default: false
	 */
	 'UNLISTED' => true,

	/**
	 * Titel der Konferenz (kann Leer- und Sonderzeichen enthalten)
	 * Dieser im Seiten-Header, im <title>-Tag, in der About-Seite und ggf. ab weiteren Stellen als
	 * Anzeigetext benutzt
	 */
	'TITLE' => '34C3 Lounge Streams',

	/**
	 * Veranstalter
	 * Wird für den <meta name="author">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'AUTHOR' => 'CCC',

	/**
	 * Beschreibungstext
	 * Wird für den <meta name="description">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'DESCRIPTION' => 'Live Music streaming from the 34th Chaos Communication Congress',

	/**
	 * Schlüsselwortliste, Kommasepariert
	 * Wird für den <meta name="keywords">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'KEYWORDS' => '34C3, Hacking, Chaos Computer Club, Video, Music, Podcast, Media, Streaming, Hacker, Leipzig, Tuwat, Phasenprüfer, Phrasenprüfer, Chaos, Everywhere',

	/**
	 * HTML-Code für den Footer (z.B. für spezielle Attribuierung mit <a>-Tags)
	 * Sollte üblicherweise nur Inline-Elemente enthalten
	 * Wird diese Zeile auskommentiert, wird die Standard-Attribuierung für (c3voc.de) verwendet
	 */
	'FOOTER_HTML' => '
		by <a href="https://ccc.de">Chaos Computer Club e.V</a>,
		<a href="https://www.isystems.at/">iSystems</a>,
		<a href="https://fem.tu-ilmenau.de/">FeM</a>,
		<a href="http://www.ags.tu-bs.de/">ags</a> &amp;
		<a href="https://c3voc.de">C3VOC</a>
	',

	/**
	 * HTML-Code für den Banner (nur auf der Startseite, direkt unter dem Header)
	 * wird üblicherweise für KeyVisuals oder Textmarke verwendet (vgl. Blaues
	 * Wischiwaschi auf http://media.ccc.de/)
	 *
	 * Dieser HTML-Block wird üblicherweise in der main.less speziell für die
	 * Konferenz umgestaltet.
	 *
	 * Wird diese Zeile auskommentiert, wird kein Banner ausgegeben.
	 */
	'BANNER_HTML' => '<img src="configs/conferences/34c3/assets/min/banner.svg" width="519px" height="auto" alt="tuwat!"/>',

	/**
	 * Link zu den Recordings
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
//	'RELEASES' => 'https://media.ccc.de/c/34c3',

	/**
	 * Um die interne ReLive-Ansicht zu aktivieren, kann hier ein ReLive-JSON
	 * konfiguriert werden. Üblicherweise wird diese Datei über das Script
	 * configs/download.sh heruntergeladen, welches von einem Cronjob
	 * regelmäßig getriggert wird.
	 *
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
//	'RELIVE_JSON' => 'https://live.dus.c3voc.de/relive/34c3/index.json', # TODO check
);

/**
 * Konfiguration der Stream-Übersicht auf der Startseite
 */
$CONFIG['OVERVIEW'] = array(
	/**
	 * Abschnitte aud der Startseite und darunter aufgeführte Räume
	 * Es können beliebig neue Gruppen und Räume hinzugefügt werden
	 *
	 * Die Räume müssen in $CONFIG['ROOMS'] konfiguriert werden,
	 * sonst werden sie nicht angezeigt.
	 */
	'GROUPS' => array(
		'Live Music'  => array(
			'fresswuerfel',
			'electric_cube',
			'shell_beach',
			'bar',
			'kloparty',
		),
	),
);



/**
 * Liste der Räume (= Audio & Video Produktionen, also auch DJ-Sets oä.)
 */
$CONFIG['ROOMS'] = array(
	'fresswuerfel' => array(
		'DISPLAY' => 'Unwetterbar (Halle 1 / 3)',
		'STREAM' => 'a2',
		'MUSIC' => true,
		'EMBED' => false,
		'DEFAULT_SELECTION' => '#switcher',
	),
	'electric_cube' => array(
		'DISPLAY' => 'Electric Cube (Halle 2 / CCL)',
		'STREAM' => 'a1',
		'MUSIC' => true,
		'EMBED' => false,
		'DEFAULT_SELECTION' => '#switcher',
	),
	'shell_beach' => array(
		'DISPLAY' => 'Shell Beach (CCL unten)',
		'STREAM' => 'a4',
		'MUSIC' => true,
		'EMBED' => false,
		'DEFAULT_SELECTION' => '#switcher',
	),
	'bar' => array(
		'DISPLAY' => 'Bar (Halle 2)',
		'STREAM' => 'a3',
		'MUSIC' => true,
		'EMBED' => false,
		'DEFAULT_SELECTION' => '#switcher',
	),
	'kloparty' => array(
		'DISPLAY' => 'Kloparty (Klo)',
		'STREAM' => 'kloparty',
		'MUSIC' => true,
		'EMBED' => false,
		'DEFAULT_SELECTION' => '#switcher',
	),

);


/**
 * Konfigurationen zum Konferenz-Fahrplan
 * Wird dieser Block auskommentiert, werden alle Fahrplan-Bezogenen Features deaktiviert
 */
//$CONFIG['SCHEDULE'] = array(
//	/**
//	 * URL zum Fahrplan-XML
//	 *
//	 * Diese URL muss immer verfügbar sein, sonst könnte die Programm-Ansicht
//	 * aufhören zu funktionieren. Üblicherweise wird diese daher Datei über
//	 * das Script configs/download.sh heruntergeladen, welches von einem
//	 * Cronjob regelmäßig getriggert wird.
//	 */
//	 'URL' => 'http://data.c3voc.de/34C3/everything.schedule.xml',
//	# alternatives:
//	#'URL' => 'https://fahrplan.events.ccc.de/congress/2017/Fahrplan/schedule.xml',
//	#'URL' => 'https://events.ccc.de/congress/2017/Fahrplan/schedule.xml',
//
//	/**
//	 * Nur die angegebenen Räume aus dem Fahrplan beachten
//	 *
//	 * Wird diese Zeile auskommentiert, werden alle Räume angezeigt
//	 */
//	'ROOMFILTER' => array('Saal Adams', 'Saal Borg', 'Saal Clarke', 'Saal Dijkstra'),
//
//	/**
//	 * Skalierung der Programm-Vorschau in Sekunden pro Pixel
//	 */
//	'SCALE' => 7,
//
//	/**
//	 * Simuliere das Verhalten als wäre die Konferenz bereits heute
//	 *
//	 * Diese folgende Beispiel-Zeile Simuliert, dass das
//	 * Konferenz-Datum 2016-12-29 auf den heutigen Tag 2016-02-24 verschoben ist.
//	 */
//	//'SIMULATE_OFFSET' => strtotime(/* Conference-Date */ '2016-12-27') - strtotime(/* Today */ date('Y-m-d')),
//	//'SIMULATE_OFFSET' => 0,
//);



/**
 * Konfiguration des Feedback-Formulars
 *
 * Wird dieser Block auskommentiert, wird das gesamte Feedback-System deaktiviert
 */
$CONFIG['FEEDBACK'] = array(
	/**
	 * DSN zum abspeichern der eingegebenen Daten
	 * die Datenbank muss eine Tabelle enthaltem, die dem in `lib/schema.sql` angegebenen
	 * Schema entspricht.
	 *
	 * Achtung vor Dateirechten: Bei SQLite reicht es nicht, wenn wer Webseiten-Benutzer
	 * die .sqlite3-Datei schreiben darf, er muss auch im übergeordneten Order neue
	 * (Lock-)Dateien anlegen dürfen
	 */
	'DSN' => 'sqlite:/opt/streaming-feedback/feedback.sqlite3',

	/**
	 * Login-Daten für die /feedback/read/-Seite, auf der eingegangenes
	 * Feedback gelesen werden kann.
	 *
	 * Durch auskommentieren der beiden Optionen wird diese Seite komplett deaktiviert,
	 * es kann dann nur noch durch manuelle Inspektion der .sqlite3-Datei auf das Feedback
	 * zugegriffen werden.
	 */
	'USERNAME' => 'katze',
	'PASSWORD' => trim(@file_get_contents('/opt/streaming-feedback/feedback-password')),
);

/**
 * Globaler Schalter für die Embedding-Funktionalitäten
 *
 * Wird diese Zeile auskommentiert oder auf False gesetzt, werden alle
 * Embedding-Funktionen deaktiviert.
 */
$CONFIG['EMBED'] = false;

/**
 * Konfiguration des L2S2-Systems
 * https://github.com/c3subtitles/L2S2
 *
 * Wird dieser Block auskommentiert, wird das gesamte Subtitle-System deaktiviert
 */

// $CONFIG['SUBTITLES'] = array(
// 	/**
// 	 * URL des L2S2 Primus-Servers
// 	 */
// 	'PRIMUS_URL' => 'https://live.c3subtitles.de/',
//
// 	/**
// 	 * URL des L2S2 Frontend-Servers
// 	 */
// 	'FRONTEND_URL' => 'https://live.c3subtitles.de/',
// );

/**
 * Globale Konfiguration der IRC-Links.
 *
 * Wird dieser Block auskommentiert, werden keine IRC-Links mehr erzeugt. Sollen die
 * IRC-Links für jeden Raum einzeln konfiguriert werden, muss dieser Block trotzdem
 * existieren sein. ggf. einfach auf true setzen:
 *
 *   $CONFIG['IRC'] = true
 */
//$CONFIG['IRC'] = array(
//	/**
//	 * Anzeigetext für die IRC-Links.
//	 *
//	 * %s wird durch den Raum-Slug ersetzt.
//	 * Ist eine weitere Anpassung erfoderlich, kann ein IRC_CONFIG-Block in der
//	 * Raum-Konfiguration zum Überschreiben dieser Angaben verwendet werden.
//	 */
//	'DISPLAY' => '#34C3-%s @ hackint',
//
//	/**
//	 * URL für die IRC-Links.
//	 * Hierbei kann sowohl ein irc://-Link als auch ein Link zu einem
//	 * WebIrc-Provider wie z.B. 'https://kiwiirc.com/client/irc.hackint.eu/#33C3-%s'
//	 * verwendet werden.
//	 *
//	 * %s wird durch den urlencodeten Raum-Slug ersetzt.
//	 * Eine Anpassung kann ebenfalls in der Raum-Konfiguration vorgenommen werden.
//	 */
//	'URL' => 'irc://irc.hackint.eu:6667/34C3-%s',
//);

/**
 * Globale Konfiguration der Twitter-Links.
 *
 * Wird dieser Block auskommentiert, werden keine Twitter-Links mehr erzeugt. Sollen die
 * Twitter-Links für jeden Raum einzeln konfiguriert werden, muss dieser Block trotzdem
 * existieren sein. ggf. einfach auf true setzen:
 *
 *   $CONFIG['TWITTER'] = true
 */
// $CONFIG['TWITTER'] = array(
// 	/**
// 	 * Anzeigetext für die Twitter-Links.
// 	 *
// 	 * %s wird durch den Raum-Slug ersetzt.
// 	 * Ist eine weitere Anpassung erfoderlich, kann ein TWITTER_CONFIG-Block in der
// 	 * Raum-Konfiguration zum Überschreiben dieser Angaben verwendet werden.
// 	 */
// 	'DISPLAY' => '#%s @ twitter',
//
// 	/**
// 	 * Vorgabe-Tweet-Text für die Twitter-Links.
// 	 *
// 	 * %s wird durch den Raum-Slug ersetzt.
// 	 * Eine Anpassung kann ebenfalls in der Raum-Konfiguration vorgenommen werden.
// 	 */
// 	'TEXT' => '#34C3 #%s',
// );

/**
 * Liste zusätzlich herunterzuladender Dateien
 *
 * Dict mit dem Dateinamen im Key und einer URL im Value. Die Dateien werden
 * unter dem angegebenen Dateinamen in diesem Konfigurationsordner abgelegt.
 */
$CONFIG['EXTRA_FILES'] = array(
//	'schedule.xml'  => 'https://fahrplan.events.ccc.de/congress/2017/Fahrplan/schedule.xml',
//	'schedule.json' => 'https://fahrplan.events.ccc.de/congress/2017/Fahrplan/schedule.json',
//	'schedule.ics'  => 'https://fahrplan.events.ccc.de/congress/2017/Fahrplan/schedule.ics',
//	'schedule.xcal' => 'https://fahrplan.events.ccc.de/congress/2017/Fahrplan/schedule.xcal',
//
//	'everything.schedule.xml' => 'http://data.c3voc.de/34C3/everything.schedule.xml',
//	'everything.schedule.json' => 'http://data.c3voc.de/34C3/everything.schedule.json',
//
//	'workshops.schedule.xml' => 'http://data.c3voc.de/34C3/workshops.schedule.xml',
//	'workshops.schedule.json' => 'http://data.c3voc.de/34C3/workshops.schedule.json',
);

return $CONFIG;
