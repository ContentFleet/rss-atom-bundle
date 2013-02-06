<?php
/**
 * Rss/Atom Bundle for Symfony 2
 *
 * @package RssAtomBundle\Protocol
 *
 * @license http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @copyright (c) 2013, Alexandre Debril
 *
 */
namespace Debril\RssAtomBundle\Protocol;

use \SimpleXMLElement;
use Debril\RssAtomBundle\Driver\HttpDriver;
use Debril\RssAtomBundle\Protocol\Parser\ParserException;

class FeedReader
{

    /**
     *
     * @var type
     */
    protected $parsers = array();

    /**
     *
     * @var Debril\RssAtomBundle\Driver\Driver
     */
    protected $driver = null;

    /**
     *
     * @param \Debril\RssAtomBundle\Driver\HttpDriver $driver
     */
    public function __construct( HttpDriver $driver )
    {
        $this->driver = $driver;
    }

    /**
     * @param Parser $parser
     * @return \Debril\RssAtomBundle\Protocol\FeedReader
     */
    public function addParser(Parser $parser)
    {
        $this->parsers[] = $parser;

        return $this;
    }

    /**
     *
     * @return \Debril\RssAtomBundle\Driver\HttpDriver
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     *
     * @param string $url
     * @param \DateTime $lastModified
     * @return \Debril\RssAtomBundle\Protocol\FeedContent
     */
    public function getFeedContent($url, \DateTime $lastModified)
    {
        $response = $this->getResponse($url, $lastModified);

        return $this->parseBody($response);
    }

    /**
     *
     * @param string $url
     * @param \Datetime $lastModified
     * @return \Debril\RssAtomBundle\Driver\HttpDriverResponse
     */
    public function getResponse($url, \Datetime $lastModified)
    {
        return $this->getDriver()->getResponse($url, $lastModified);
    }

    /**
     * @param HttpMessage $message
     * @return \Debril\RssAtomBundle\Protocol\FeedContent
     */
    public function parseBody(\Debril\RssAtomBundle\Driver\HttpDriverResponse $response)
    {
        $xmlBody = new SimpleXMLElement($response->getBody());
        $parser = $this->getAccurateParser($xmlBody);

        return $parser->parse($xmlBody);
    }

    /**
     * @param SimpleXMLElement $xmlBody
     * @throws ParserException
     * @return Parser
     */
    public function getAccurateParser(SimpleXMLElement $xmlBody)
    {

        foreach ($this->parsers as $parser)
        {
            if ( $parser->canHandle($xmlBody) )
            {
                return $parser;
            }
        }

        throw new ParserException('No parser can handle this stream');
    }

}