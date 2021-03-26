<?php

namespace SpaceMvc\Framework\Library\Abstract;

/**
 * Class MailAbstract
 * @package SpaceMvc\Framework\Library\Abstract
 */
abstract class MailAbstract
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
     * initHeaders
     * @return $this
     */
    abstract public function initHeaders() : self;

    /**
     * initBody
     * @return $this
     */
    abstract public function initBody() : self;

    /**
     * send
     * @return mixed
     */
    abstract public function send() : mixed;

    /**
     * setSendTo
     * @param array $sendTo
     * @return $this
     */
    abstract public function setSendTo(array $sendTo) : self;

    /**
     * setSendFrom
     * @param string $sendFrom
     * @return $this
     */
    abstract public function setSendFrom(string $sendFrom) : self;

    /**
     * setCc
     * @param string $cc
     * @return $this
     */
    abstract public function setCc(string $cc) : self;

    /**
     * setHeaders
     * @param string $headers
     * @return $this
     */
    abstract public function setHeaders(string $headers) : self;

    /**
     * setSubject
     * @param string $subject
     * @return $this
     */
    abstract public function setSubject(string $subject) : self;

    /**
     * setBody
     * @param string $body
     * @return $this
     */
    abstract public function setBody(string $body) : self;
}
