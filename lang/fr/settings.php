<?php

/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * 
 * @author Schplurtz le Dévoulonné <Schplurtz@laposte.net>
 */
$lang['smtp_host']             = 'Votre serveur SMTP sortant.';
$lang['smtp_port']             = 'Port d\'écoute du serveur SMTP. Habituellement 25. 465 pour SSL';
$lang['smtp_ssl']              = 'Type de chiffrement utilisé lors des communications avec votre serveur SMTP.';
$lang['smtp_ssl_o_8']          = 'aucun';
$lang['smtp_ssl_o_4']          = 'SSL';
$lang['smtp_ssl_o_2']          = 'TLS';
$lang['auth_user']             = 'SI une authentification est nécessaire, indiquez ici le nom d\'utilisateur.';
$lang['auth_pass']             = 'Mot de passe du compte ci dessus.';
$lang['pop3_host']             = 'Si votre serveur utilise POP-avant-SMTP comme authentification, indiquez vos identifiants POP3 ci dessus, et le nom du serveur POP3 ici. Pour une authentification SMTP habituelle, laisser ce champ vide.';
$lang['localdomain']           = 'Nom à utiliser durant la phase HELO du protocole SMTP. Devrait être le FQDN du serveur web sur lequel DokuWiki fonctionne. Laisser vide pour une détection automatique.';
$lang['debug']                 = 'Afficher un journal d\'erreur complet en cas d\'échec d\'envoi. Désactiver lorsque tout fonctionne.';
