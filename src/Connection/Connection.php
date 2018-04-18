<?php

/**
 * FRAMEWORK
 *
 * Copyright (C) FRAMEWORK
 *
 * @package   dvbs-ibob.anatom5dev.offline
 * @file      Connection.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2018 owner
 */

namespace BlackForest\PiwikBundle\Connection;

use GuzzleHttp\Client;

/**
 * The class provide the connection for piwik api.
 */
class Connection implements ConnectionInterface
{
    /**
     * The piwik api token.
     *
     * @var string
     */
    private $token;

    /**
     * The piwik api url.
     *
     * @var string
     */
    private $url;

    /**
     * The client.
     *
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $format = ConnectionInterface::FORMAT_SERIALIZED;

    /**
     * The piwik connection parameter.
     *
     * @var array
     */
    private $parameter = [];

    /**
     * @var array
     */
    private $domains;

    /**
     * Connection constructor.
     *
     * @param string $token   The piwik api token.
     * @param string $url     The piwik api url.
     * @param array  $domains The statistic domains.
     */
    public function __construct($token = 'anonymous', $url = null, array $domains = [])
    {
        $this->token   = $token;
        $this->url     = $url;
        $this->client  = new Client();
        $this->domains = $domains;
    }

    /**
     * {@inheritDoc}
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * {@inheritDoc}
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameter($name)
    {
        return $this->parameter[$name] ?: null;
    }

    /**
     * {@inheritDoc}
     */
    public function setParameter($name, $value)
    {
        $this->parameter = \array_merge($this->parameter, [$name => $value]);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function removeParameter($name)
    {
        if (!$this->getParameter($name)) {
            return;
        }

        unset($this->parameter[$name]);
    }

    /**
     * {@inheritDoc}
     */
    public function request()
    {
        $paremters = \array_merge(
            [
                'module'     => 'API',
                'format'     => $this->format,
                'token_auth' => $this->token
            ],
            $this->parameter
        );

        $urlParmeter = '?';
        foreach ($paremters as $paremterKey => $paremterValue) {
            if ('?' !== $urlParmeter) {
                $urlParmeter .= '&';
            }

            $urlParmeter .= $paremterKey . '=' . \urlencode($paremterValue);
        }

        $request = $this->client->request('GET', $this->url . $urlParmeter);

        // Clear the parameter list for a new request.
        $this->parameter = [];
        // Reset the connection to the standard request format.
        $this->format = ConnectionInterface::FORMAT_SERIALIZED;

        return $request;
    }

    public function getDomainInformation()
    {
        $this->setParameter('method', 'SitesManager.getAllSites');

        $piwikDomains = \unserialize($this->request()->getBody()->getContents());

        $statisticDomain = [];
        foreach ($this->domains as $domain) {
            foreach ($piwikDomains as $piwikDomain) {
                if (!('website' === $piwikDomain['type'])
                    || !(\stristr($piwikDomain['main_url'], $domain))
                ) {
                    continue;
                }

                $statisticDomain[] = $piwikDomain;
            }
        }

        return $statisticDomain;
    }
}
