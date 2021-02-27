<?php

namespace SpaceMvc\Framework;

/**
 * Class Mail
 * @package SpaceMvc\Framework
 */
class Mail
{
    /** @var array $sendTo */
    protected array $sendTo = ['somebody@example.com','somebodyelse@example.com'];

    /** @var string $sendFrom */
    protected string $sendFrom = 'webmaster@example.com';

    /** @var string $cc */
    protected string $cc = 'webmaster@example.com';

    /** @var string $headers */
    protected string $headers = '';

    /** @var string $subject */
    protected string $subject = 'HTML email';

    /** @var string $body */
    protected string $body = '';

    /**
     * initBody.
     */
    public function __construct()
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
    }

    /**
     * initHeaders.
     */
    public function initHeaders() : void
    {
        $headers  = "From: Sender Name <".$this->sendFrom.">" . "\r\n";
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= 'Cc: '.$this->cc.'' . "\r\n";
        $this->headers = $headers;
    }

    /**
     * send
     * @return \mail
     */
    public function send() : \mail
    {
        $this->initHeaders();
        return \mail(implode(',', $this->sendTo), $this->subject, $this->body, $this->headers);
    }

    /**
     * setSendTo
     * @param array $sendTo
     * @return Mail
     */
    public function setSendTo(array $sendTo) : Mail
    {
        $this->sendTo = $sendTo;
        return $this;
    }

    /**
     * setSendFrom
     * @param string $sendFrom
     * @return Mail
     */
    public function setSendFrom(string $sendFrom) : Mail
    {
        $this->sendFrom = $sendFrom;
        return $this;
    }

    /**
     * setCc
     * @param string $cc
     * @return Mail
     */
    public function setCc(string $cc) : Mail
    {
        $this->cc = $cc;
        return $this;
    }

    /**
     * setHeaders
     * @param string $headers
     * @return Mail
     */
    public function setHeaders(string $headers) : Mail
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * setSubject
     * @param string $subject
     * @return Mail
     */
    public function setSubject(string $subject) : Mail
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * setBody
     * @param string $body
     * @return Mail
     */
    public function setBody(string $body) : Mail
    {
        $this->body = $body;
        return $this;
    }
}
