<?php
/**
 * SwiftMailer plugin
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Andreas Gohr <andi@splitbrain.org>
 */

// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');

class action_plugin_swiftmail extends DokuWiki_Action_Plugin {

    /**
     * return some info
     *
     * @author Andreas Gohr <andi@splitbrain.org>
     */
    function getInfo(){
        return array(
            'author' => 'Andreas Gohr',
            'email'  => 'andi@splitbrain.org',
            'date'   => '2008-09-26',
            'name'   => 'SwiftMailer Plugin',
            'desc'   => 'Use SwiftMailer for sending mails from DokuWiki (uses SwiftMailer 3.3.3-php5)',
            'url'    => 'http://wiki:splitbrain.org/plugin:swiftmail',
        );
    }

    /**
     * register the eventhandlers
     *
     * @author Andreas Gohr <andi@splitbrain.org>
     */
    function register(&$controller){
        $controller->register_hook('MAIL_MESSAGE_SEND',
                                   'BEFORE',
                                   $this,
                                   'handle_message_send',
                                   array());
    }

    /**
     * Handle the message send event and use SwiftMailer to mail
     */
    function handle_message_send(&$event, $param){
        require_once dirname(__FILE__).'/Swift.php';
        require_once dirname(__FILE__).'/Swift/Connection/SMTP.php';
        $ok = false;

        if($this->getConf('debug')){
            $log =& Swift_LogContainer::getLog();
            $log->setLogLevel(Swift_Log::LOG_EVERYTHING);
        }

        try {
            // initialize the connection
            $smtp =& new Swift_Connection_SMTP(
                        $this->getConf('smtp_host'),
                        $this->getConf('smtp_port'),
                        $this->getConf('smtp_ssl')
                     );

            // use SMTP auth?
            if($this->getConf('auth_user')) $smtp->setUsername($this->getConf('auth_user'));
            if($this->getConf('auth_pass')) $smtp->setPassword($this->getConf('auth_pass'));

            // start Swift
            $swift =& new Swift($smtp);

            // prepare message (Swift autodetects UTF-8)
            $message =& new Swift_Message($event->data['subject'], $event->data['body']);

            // handle the recipients (duplicates some code from mail_encode_address)
            $reci =& new Swift_RecipientList();
            $from = null;
            foreach(array('to','cc','bcc','from') as $hdr){
                $parts = split(',',$event->data[$hdr]);
                foreach ($parts as $part){
                    $part = trim($part);

                    // parse address
                    if(preg_match('#(.*?)<(.*?)>#',$part,$matches)){
                        $text = trim($matches[1]);
                        $addr = $matches[2];
                    }else{
                        $addr = $part;
                    }

                    // skip empty ones
                    if(empty($addr)) continue;

                    // add
                    if($hdr == 'from'){
                        $from =& new Swift_Address($addr,$text);
                    }else{
                        $reci->add($addr,$text,$hdr);
                    }
                }
            }

            // now finally send the mail
            $ok = $swift->send($message, $reci, $from);
        } catch (Swift_ConnectionException $e) {
            msg('There was a problem communicating with SMTP: '.$e->getMessage(),-1);
        } catch (Swift_Message_MimeException $e) {
            msg('There was an unexpected problem building the email: '.$e->getMessage(),-1);
        } catch(Exception $e){
            msg('There was an unexpected problem with sending the email: '.$e->getMessage(),-1);
        }

        if(!$ok && $this->getConf('debug')){
            dbg( $log->dump(true) );
        }

        $event->preventDefault();
        $event->stopPropagation();
        return $ok;
    }
}

