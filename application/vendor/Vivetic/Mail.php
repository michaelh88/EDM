<?php

define("LIBR", "\r\n");

final class Mailer {

    var $from_name;
    var $from_mail;
    var $mail_to;
    var $mail_cc;
    var $mail_bcc;
    var $mail_reply;
    var $reply_name;

    var $mail_headers;
    var $mail_subject;
    var $mail_body = "";

    var $valid_mail_adresses; // boolean is true if all mail(to) adresses are valid
    var $uid; // the unique value for the mail boundry
    var $mail_priority = 3; // 3 = normal, 2 = high, 4 = low

    var $att_files = array();
    var $msg = array();

    const EMAIL_PATTERN = "/^[\w-]+(\.[\w-]+)*@([0-9a-z][0-9a-z-]*[0-9a-z]\.)+([a-z]{2,4})$/i";

    // functions inside this constructor
    // - validation of e-mail adresses
    // - setting mail variables
    // - setting boolean $valid_mail_adresses
    function Mailer($name = "", $from, $to, $cc = "", $bcc = "", $reply = "", $replyName = "", $subject = "", $body = "") {
        $this->valid_mail_adresses = true;
        if (!$this->check_mail_address($to)) {
            $this->msg[] = "Error, the \"mailto\" address is empty or not valid.";
            $this->valid_mail_adresses = false;
        }
        if (!$this->check_mail_address($from)) {
            $this->msg[] = "Error, the \"from\" address is empty or not valid.";
            $this->valid_mail_adresses = false;
        }
        if ($cc != "") {
            if (!$this->check_mail_address($cc)) {
                $this->msg[] = "Error, the \"Cc\" address is not valid.";
                $this->valid_mail_adresses = false;
            }
        }
        if ($bcc != "") {
            if (!$this->check_mail_address($bcc)) {
                $this->msg[] = "Error, the \"Bcc\" address is not valid.";
                $this->valid_mail_adresses = false;
            }
        }
        if ($reply != "") {
	  if (!$this->check_mail_address($reply)) {
                $this->msg[] = "Error, the \"Reply\" address is not valid.";
                $this->valid_mail_adresses = false;
            }
        }
        if ($this->valid_mail_adresses) {
            $this->from_name = $this->strip_line_breaks($name);
            $this->from_mail = $this->strip_line_breaks($from);
            $this->mail_to = $this->strip_line_breaks($to);
            $this->mail_cc = $this->strip_line_breaks($cc);
            $this->mail_bcc = $this->strip_line_breaks($bcc);
            $this->mail_reply = $this->strip_line_breaks($reply == "" ? $name : $reply);
            $this->reply_name = $this->strip_line_breaks($replyName);
            $this->mail_subject = $this->strip_line_breaks($subject);
            $this->create_mime_boundry();
            $this->mail_body = $this->create_msg_body($body);
            $this->mail_headers = $this->create_mail_headers();
        } else {
            return;
        }
    }
    function get_msg_str() {
        $messages = "";
        foreach($this->msg as $val) {
            $messages .= $val."<br>\n";
        }
        return $messages;
    }
    // use this to prent formmail spamming
    function strip_line_breaks($val) {
        $val = preg_replace("/([\r\n])/", "", $val);
        return $val;
    }
    function check_mail_address($mail_addresses) {
      $res = true;;
      $mails = explode(", ", $mail_addresses);
      foreach($mails as $mail_address) {
	if (preg_match(self::EMAIL_PATTERN, $mail_address)) {
	  $res = true;
	} else {
	  $res = false;
	  break;
	}
      }
      return $res;
    }
    function create_mime_boundry() {
        $this->uid = "_".md5(uniqid(time()));
    }
    function get_file_data($filepath) {
        if (file_exists($filepath)) {
            if (!$str = file_get_contents($filepath)) {
                $this->msg[] = "Error while opening attachment \"".basename($filepath)."\"";
            } else {
                return $str;
            }
        } else {
            $this->msg[] = "Error, the file \"".basename($filepath)."\" does not exist.";
            return;
        }
    }
    // remember "LIBR" is the line break defined in constact above
    function create_msg_body($mail_msg, $cont_tranf_enc = "7bit", $type = "text/html", $enc = "utf-8") {
        $str = "--".$this->uid.LIBR;
        $str .= "Content-type:".$type."; charset=".$enc.LIBR;
        $str .= "Content-Transfer-Encoding: ".$cont_tranf_enc.LIBR.LIBR;
        $str .= trim($mail_msg).LIBR.LIBR;
        return $str;
    }
    function create_mail_headers() {
        if ($this->from_name != "") {
            $headers = "From: ".$this->from_name." <".$this->from_mail.">".LIBR;
        } else {
            $headers = "From: ".$this->from_mail.LIBR;
        }
        if ($this->reply_name != "") {
            $headers .= "Reply-To: ".$this->reply_name." <".$this->mail_reply.">".LIBR;
        }
        else {
            $headers .= "Reply-To: ".$this->mail_reply.LIBR;
        }
        if ($this->mail_cc != "") $headers .= "Cc: ".$this->mail_cc.LIBR;
        if ($this->mail_bcc != "") $headers .= "Bcc: ".$this->mail_bcc.LIBR;
        $headers .= "MIME-Version: 1.0".LIBR;
        $headers .= "X-Mailer: Attachment Mailer ver. 1.0".LIBR;
        $headers .= "X-Priority: ".$this->mail_priority.LIBR;
        $headers .= "Content-Type: multipart/mixed;".LIBR.chr(9)." boundary=\"".$this->uid."\"".LIBR.LIBR;
        $headers .= "This is a multi-part message in MIME format.".LIBR.LIBR;
        return $headers;
    }

    // use for $dispo "attachment" or "inline" (f.e. example images inside a html mail
    function create_attachment_part($file, $dispo = "attachment") {
        if (!$this->valid_mail_adresses) return;
        $file_str = $this->get_file_data($file);
        if ($file_str == "") {
            return;
        } else {
            $filename = basename($file);
            $file_type = filetype($file);
            $chunks = chunk_split(base64_encode($file_str));
            $mail_part = "--" . $this->uid . LIBR;
            $mail_part .= "Content-type:" . $file_type . ";" . LIBR . chr(9) . " name=\"" . $filename . "\"" . LIBR;
            $mail_part .= "Content-Transfer-Encoding: base64" . LIBR;
            $mail_part .= "Content-Disposition: " . $dispo . ";" . chr(9) . "filename=\"" . $filename . "\"" . LIBR . LIBR;
            $mail_part .= $chunks;
            $mail_part .= LIBR . LIBR;
            $this->att_files[] = $mail_part;
        }
    }
    function process_mail() {
	if (!$this->valid_mail_adresses) return 0;
	$mail_message = $this->mail_body;
        if (count($this->att_files) > 0) {
            foreach ($this->att_files as $val) {
                $mail_message .= $val;
            }
            $mail_message .= "--".$this->uid."--";
        }
        if (mail($this->mail_to, $this->mail_subject, $mail_message, $this->mail_headers)) {
            $this->msg[] = "Your mail is succesfully submitted.";
            return 1;
        } else {
            $this->msg[] = "Error while sending the mail.";
            return 0;
        }
    }
}

?>