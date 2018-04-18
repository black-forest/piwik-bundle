<?php
/**
 * FRAMEWORK
 *
 * Copyright (C) FRAMEWORK
 *
 * @package   dvbs-ibob.anatom5dev.offline
 * @file      ConnectionInterface.php
 * @author    Sven Baumann <baumann.sv@gmail.com>
 * @author    Dominik Tomasi <dominik.tomasi@gmail.com>
 * @license   GNU/LGPL
 * @copyright Copyright 2018 owner
 */


namespace BlackForest\PiwikBundle\Connection;


use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * The interface for the piwik connection.
 * This interface provide the available response format.
 */
interface ConnectionInterface
{
    const FORMAT_XML        = 'xml';
    const FORMAT_JSON       = 'json';
    const FORMAT_TSV        = 'tsv';
    const FORMAT_SERIALIZED = 'php';

    /**
     * Get the response format.
     *
     * @return string
     */
    public function getFormat();

    /**
     * Set the response format. Use the class constants.
     * Available formats are xml, JSON or Tsv(excel).
     *
     * @param string $format The response format.
     *
     * @return ConnectionInterface
     */
    public function setFormat($format);

    /**
     * Return the connections parameter.
     *
     * @param string $name The parameter name.
     *
     * @return array
     */
    public function getParameter($name);

    /**
     * Set an parameter.
     *
     * @param string $name  The parameter name.
     * @param string $value The parameter value.
     *
     * @return ConnectionInterface
     */
    public function setParameter($name, $value);

    /**
     * Remove the connections parameter.
     *
     * @param string $name The parameter name.
     *
     * @return void
     */
    public function removeParameter($name);

    /**
     * Get the request from piwik.
     *
     * @return ResponseInterface
     */
    public function request();

    /**
     * Get the domain information their available.
     *
     * @return array
     */
    public function getDomainInformation();
}
