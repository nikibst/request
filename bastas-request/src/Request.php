<?php

namespace Bastas\Request;


final class Request
{
    private $request = null;

    public function __construct(\Zend\Diactoros\ServerRequest $request)
    {
        $this->request = $request;
    }

    public function getAttributes() : array
    {
        return $this->request->getAttributes();
    }

    public function getCookieParams() : array
    {
        return $this->request->getCookieParams();
    }

    public function getParsedBody() : array
    {
        return $this->request->getParsedBody();
    }

    public function getQueryParams() : array
    {
        return $this->request->getQueryParams();
    }

    public function getServerParams() : array
    {
        return $this->request->getServerParams();
    }

    public function getUploadedFiles() : array
    {
        return $this->request->getUploadedFiles();
    }

    public function getHeaders() : array
    {
        return $this->request->getHeaders();
    }

    public function getHeader(string $header) : array
    {
        return $this->request->getHeader($header);
    }

    public function getScheme() : string
    {
        return $this->request->getUri()->getScheme();
    }

    public function getUserInfo() : string
    {
        return $this->request->getUri()->getUserInfo();
    }

    public function getHost() : string
    {
        return $this->request->getUri()->getHost();
    }

    public function getPort() : int
    {
        return $this->request->getUri()->getPort();
    }

    public function getUri() : string
    {
        return $this->request->getUri()->getPath();
    }

    public function getFullQueryString() : string
    {
        return $this->request->getUri()->getQuery();
    }

    public function getFragment() : string
    {
        return $this->request->getUri()->getFragment();
    }


    public function getMethod() : string
    {
        return $this->request->getMethod();
    }

    public function getCurrentUrl(bool $withQueryString = false) : string
    {
        $url = $this->getScheme() . '://' .  $this->getHost() . ':' . $this->getPort() . $this->getUri();

        if(true === $withQueryString) {
            if('' !== $this->getFullQueryString()) {
                $url .= '?' .  $this->getFullQueryString();
            }
        }

        return $url;
    }

    public function isAjaxRequest() : bool
    {
        if(!empty($this->request->getServerParams()['HTTP_X_REQUESTED_WITH']) &&
            strtolower($this->request->getServerParams()['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {
            return true;
        }

        return false;
    }
}