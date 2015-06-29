<?php

/**
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * 
 * @author Daniel Raknes <rada@jbv.no>
 */
$lang['smtp_host']             = 'Utgående SMTP server.';
$lang['smtp_port']             = 'Porten din SMTP server lytter til. Som vanlig port 25. Port 465 brukes ved SSL.';
$lang['smtp_ssl']              = 'Hvilken type kryptering brukes ved kommunikasjon med SMTP serveren?';
$lang['smtp_ssl_o_8']          = 'ingen';
$lang['smtp_ssl_o_4']          = 'SSL';
$lang['smtp_ssl_o_2']          = 'TLS';
$lang['auth_user']             = 'Hvis autentisering er påkrevd, skriv inn brukernavnet ditt her.';
$lang['auth_pass']             = 'Passord for brukeren over.';
$lang['pop3_host']             = 'Hvis du bruker POP-før-SMTP for autentisering, sett inn POP3 pålogging over og legg inn POP3 serveren her. For ordinær SMTP autentisering skal dette feltet være blankt.';
$lang['localdomain']           = 'Navnet som skal brukes i HELO fasen av SMTP. Må være FQDN påå serveren som DokuWikien kjører på. La feltet være blankt for autodeteksjon.  ';
$lang['debug']                 = 'Logge alt i error-loggen når sending av epost feiler? Deaktiver dersom alt fungerer!';
