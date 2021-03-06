<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'archi2000wp');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+dtj/9-r=7D~Y9Y^X4|?h?V,yn}#^I4nf5!uQ~GuyVKPN>pvZnBD)57TMoNV09_A');
define('SECURE_AUTH_KEY',  '4z`|imxM@P[Ors|, AnU@=%Onh{|61BlXRV<ZNV&tg5XiO|-6`0}H#9pk<NB2$W,');
define('LOGGED_IN_KEY',    '|ovD0%|N[2gX[W>1JU)UP[uAu|M}%FenL+(=  Cn,dT=]3uaSdcm|//B4vA7Itd,');
define('NONCE_KEY',        'w6 y4ORJc0A3AytG_C=o(v7W{|({LZ_wAFq[>6F^_E19%^+;&xwyd-PoYG&-qcvE');
define('AUTH_SALT',        'vET]W@(TQ[d`Ov?pr- RiPlTB%|^~A{|#gP&]z-yw]%~oowQC1t% 8PKQoeu=).<');
define('SECURE_AUTH_SALT', '4{yDVwD-X?^@?jbgW%M2^uG-v!978ca.%9A w;].}Ab[N@-kXUwTvsglrOKB?SA>');
define('LOGGED_IN_SALT',   'Seq:h<E{rDM_Y[l^}hPM+{gM(s.:&2($I-n4|ySJaZ}:<>5Y(;SLMK3X>fKlyIw`');
define('NONCE_SALT',       '5|-|c=wZcTA3#@]qs[}9L7T5YX<]I_qck7mmpO<78|.h=Z]=[<}_RQE@xB^I;?!S');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 


// LE SUPER LOG DE DEBUG DE MERDE ;)
// ini_set('log_errors',TRUE);
// ini_set('error_reporting', E_ALL);
// ini_set('error_log', dirname(__FILE__) . '/error_log.txt');


/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');