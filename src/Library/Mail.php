<?php

namespace SpaceMvc\Framework\Library;

use SpaceMvc\Framework\Library\Abstract\MailAbstract;

/**
 * Class Mail
 * @package SpaceMvc\Framework\Library
 */
class Mail extends MailAbstract
{
    /**
     * Mail constructor.
     */
    public function __construct()
    {
        $this->initHeaders();
        $this->initBody();
    }

    /**
     * initHeaders
     * @return $this
     */
    public function initHeaders() : self
    {
        $headers  = "From: Sender Name <".$this->sendFrom.">" . "\r\n";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= 'Cc: '.$this->cc.'' . "\r\n";
        $this->headers = $headers;
        return $this;
    }

    /**
     * initBody
     * @return $this
     */
    public function initBody() : self
    {
        $this->body = "
        <html>
            <head>
                <title>HTML email</title>
            </head>
            <body>
                <p>This email contains HTML Tags!</p>
                <table>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                    </tr>
                    <tr>
                        <td>John</td>
                        <td>Doe</td>
                    </tr>
		</table>
	    </body>
        </html>
        ";
        return $this;
    }

    /**
     * send
     * @return mixed
     */
    public function send() : mixed
    {
        $this->initHeaders();
        return \mail(implode(',', $this->sendTo), $this->subject, $this->body, $this->headers);
    }

    /**
     * setSendTo
     * @param array $sendTo
     * @return $this
     */
    public function setSendTo(array $sendTo) : self
    {
        $this->sendTo = $sendTo;
        return $this;
    }

    /**
     * setSendFrom
     * @param string $sendFrom
     * @return $this
     */
    public function setSendFrom(string $sendFrom) : self
    {
        $this->sendFrom = $sendFrom;
        return $this;
    }

    /**
     * setCc
     * @param string $cc
     * @return $this
     */
    public function setCc(string $cc) : self
    {
        $this->cc = $cc;
        return $this;
    }

    /**
     * setHeaders
     * @param string $headers
     * @return $this
     */
    public function setHeaders(string $headers) : self
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * setSubject
     * @param string $subject
     * @return $this
     */
    public function setSubject(string $subject) : self
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * setBody
     * @param string $body
     * @return $this
     */
    public function setBody(string $body) : self
    {
        $this->body = $body;
        return $this;
    }
}
